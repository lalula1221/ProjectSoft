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
$newProNum=$_POST['ProfessorNum'];
$newPoint=$_POST['Point'];
$Sem=$_POST['Sem'];
$oldCheck="SELECT Code FROM $Sem WHERE Code='$oldCode'";
$oldChecked=$connect->query($oldCheck);
$IDcheck="SELECT Name,Number FROM user WHERE Number='$newProNum'";
$IDchecked=$connect->query($IDcheck);
if($oldChecked->num_rows==0){
    echo('error');
}
else if($IDchecked->num_rows==0){
    echo('IDerror');
}
else{
    $nameAndNum=$IDchecked->fetch_row();
    $newPro=$nameAndNum[0];
    $update="UPDATE $Sem SET Class='$newClass',Type='$newType',Professor='$newPro',ProfessorNum='$newProNum',Point='$newPoint' WHERE Code='$oldCode'";
    $connect->query($update);
}
?>
