<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$oldCode=$_POST['oldCode'];
$newClass=$_POST['Class'];
$newType=$_POST['Type'];
$newPro=$_POST['Professor'];
$newPoint=$_POST['Point'];
$Sem=$_POST['Sem'];
$oldCheck="SELECT Code FROM $Sem WHERE Code='$oldCode'";
$oldChecked=$connect->query($oldCheck);
if($oldChecked->num_rows==0){
    echo('error');
}
else{
    $update="UPDATE $Sem SET Class='$newClass',Type='$newType',Professor='$newPro',Point='$newPoint' WHERE Code='$oldCode'";
    $connect->query($update);
}
?>