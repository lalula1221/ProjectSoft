<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$newClass=$_POST['Class'];
$newType=$_POST['Type'];
$newPro=$_POST['Professor'];
$newProNum=$_POST['ProfessorNum'];
$newPoint=$_POST['Point'];
$newCode=$_POST['Code'];
$Sem=$_POST['Sem'];
$check="SELECT Code FROM $Sem WHERE Code='$newCode'";
$checked=$connect->query($check);
if($checked->num_rows>0){
    echo('error');
}
else{
    $add="INSERT INTO $Sem (Class,Type,Professor,ProfessorNum,Point,Code) VALUES('$newClass','$newType','$newPro','$newProNum','$newPoint','$newCode')" ;
    $connect->query($add);
}

?>