<?php
require 'config.php';
use TADPHP\TADFactory;
// -------------------------------------
// if (isset($_POST["retrieveTemplate"])) {
	$stuId = $_POST["stu_id"];
	$devId =  $_POST["device_id"];
	$deviceIp = '';
	$getDeviceIpQuery = "SELECT ip_addr FROM device WHERE dev_id=$devId";
	$resultIp = $dbConnection->query($getDeviceIpQuery);
	 while ($row = $resultIp->fetch_row()) {
        $deviceIp = $row[0];
    }

	// ---------- device connection setting -----------
	$zkteco = (new TADFactory(['ip'=>$deviceIp, 'com_key'=>0]))->get_instance();
	$checkHasStuQuery = "SELECT stu_id FROM biometric_data WHERE stu_id=$stuId";
	$result = $dbConnection->query($checkHasStuQuery);
	if (!$result->num_rows > 0) {
		$stuInfo = $zkteco->get_user_info(['pin'=>$stuId])->to_array();
		$bioData = array(
			'RFID_card' => $stuInfo["Row"]["Card"],
			'stu_id' => $stuId,
			'create_at'=>date('Y-m-d h:i:s a'),
			'update_at'=>date('Y-m-d h:i:s a')
			);
		$insertBioInfoQuery = "INSERT INTO biometric_data(RFID_card,stu_id,create_at,update_at) VALUES('".$bioData['RFID_card']."','".$bioData['stu_id']."','".$bioData['create_at']."','".$bioData['update_at']."')";
		if ($dbConnection->query($insertBioInfoQuery) === TRUE) {
			$lastBioId = $dbConnection->insert_id;
			$fingerTemplate = $zkteco->get_user_template(['pin'=>$stuId])->to_array();
			$fingerData = array(
				array(
					'finger_id' => $fingerTemplate["Row"][0]["FingerID"],
					'size' => $fingerTemplate["Row"][0]["Size"],
					'valid' => $fingerTemplate["Row"][0]["Valid"],
					'template' => $fingerTemplate["Row"][0]["Template"],
					'bio_id' =>$lastBioId
				),
				array(
					'finger_id' => $fingerTemplate["Row"][1]["FingerID"],
					'size' => $fingerTemplate["Row"][1]["Size"],
					'valid' => $fingerTemplate["Row"][1]["Valid"],
					'template' => $fingerTemplate["Row"][1]["Template"],
					'bio_id' =>$lastBioId
				));
			$insertFingerTemplateQuery = "INSERT INTO finger_template(finger_id,size,valid,template,bio_id) VALUES(".$fingerData[0]["finger_id"].",".$fingerData[0]["size"].",".$fingerData[0]["valid"].",'".$fingerData[0]["template"]."',".$fingerData[0]["bio_id"].");";
			$insertFingerTemplateQuery .= "INSERT INTO finger_template(finger_id,size,valid,template,bio_id) VALUES(".$fingerData[1]["finger_id"].",".$fingerData[1]["size"].",".$fingerData[1]["valid"].",'".$fingerData[1]["template"]."',".$fingerData[1]["bio_id"].")";
			if ($dbConnection->multi_query($insertFingerTemplateQuery) === TRUE) {
				echo json_encode(array('fingerId1' => $fingerData[0]["finger_id"], 'fingerId2'=> $fingerData[1]["finger_id"]));
			}
		}
	}else{
		echo json_encode(array('message' => "alrady exist!"));
	}
	$dbConnection->close();
// }

?>