<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "my_virtual_library";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
?>