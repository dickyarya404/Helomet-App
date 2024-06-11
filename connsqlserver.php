<?php
$serverName = "LAPTOP-9FK4RQP7";
$uid = "admin";
$pwd = "admin123";
$databaseName = "hellomet";

$connectionInfo = array(
	"UID" => $uid,
	"PWD" => $pwd,
	"Database" => $databaseName
);

//$con = mysqli_connect("localhost","root","","hellomet"); //for mysql
$conn = sqlsrv_connect($serverName, $connectionInfo); //for sql server

if (!$conn) {
	die("Error: Failed to connect to database!");
}
