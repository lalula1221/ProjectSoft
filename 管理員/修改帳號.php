<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$oldAcc=$_POST['oldAcc'];
$oldPass=$_POST['oldPass'];
$newPass=$_POST['newPass'];
$modifyPasInUserTable="UPDATE user set Password='$newPass' where Password='$oldPass'";
//$modifyPas="ALTER LOGIN '$oldAcc' WITH PASSWORD = N'$newPass'";
$connect->query($modifyPasInUserTable);
//$connect->query($modifyPas);
?>