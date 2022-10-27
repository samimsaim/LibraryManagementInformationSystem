<?php
require 'lib/TADFactory.php';
require 'lib/TAD.php';
require 'lib/TADResponse.php';
require 'lib/Providers/TADSoap.php';
require 'lib/Providers/TADZKLib.php';
require 'lib/Exceptions/ConnectionError.php';
require 'lib/Exceptions/FilterArgumentError.php';
require 'lib/Exceptions/UnrecognizedArgument.php';
require 'lib/Exceptions/UnrecognizedCommand.php';

 $tad_factory = new TADPHP\TADFactory();

 use TADPHP\TADFactory;
 use TADPHP\TAD;

$comands = TAD::commands_available();
$tad = (new TADFactory(['ip'=>'192.168.1.201', 'com_key'=>0]))->get_instance();
// echo $dt = $tad->get_date();
// echo '<br><pre>';
// print_r($dt = $tad->get_user_template(['pin'=>2])->to_array());
// echo '</pre>';
// echo $tad->disable();
echo $res = "http://localhost:88/kpu/index.php/biometricController/insertBioData";
?>