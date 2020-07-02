<?php

ob_start();
session_start();
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", __DIR__. DS . "uploads");
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$conn = mysqli_connect("localhost", "root", "", "vppphamgia");
//$servername = "sql106.epizy.com";
//$username = "epiz_25453430";
//$password = "r9w3t21m";
//$dbname = "epiz_25453430_farmshopping";

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
require_once ("functions.php");


?>