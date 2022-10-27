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
// --------- database connection info ----------
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "kpu_dormitory";
// ---------- database connection setting ---------
$dbConnection = new mysqli($serverName,$username,$password,$dbName);
?>