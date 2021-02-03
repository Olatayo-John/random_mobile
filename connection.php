<?php

$dbserver = "localhost";
$dbuname = "root";
$dbpass = "";
$dbDB = "randommobile";

$con = mysqli_connect($dbserver, $dbuname, $dbpass, $dbDB);

if (!$con) {
	echo "Error: " . mysqli_connect_error($con);
}
