<?php
    $sname = 'localhost';
    $uname = 'meya372com372';
    $pwd = 'P6xUbliG4cW7tE1';
    $db_name = 'meya372com_meya372';

$conn = mysqli_connect($sname, $uname, $pwd, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}