<?php
$sname = 'localhost';
$uname = 'meya37mj';
$pwd = ')E:XsioH@7whX9;25';
$db_name = 'meya37mj_meya372com_meya372';

$conn = mysqli_connect($sname, $uname, $pwd, $db_name);

if (!$conn) {
    echo "Connection failed!";
    exit();
}
