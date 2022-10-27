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
use TADPHP\TADFactory;

class fingerConfig{
	
	public function setUp($ip,$com_key = 0)
	{
		return (new TADFactory(['ip'=>$ip, 'com_key'=>$com_key]))->get_instance();
	}
}
?>