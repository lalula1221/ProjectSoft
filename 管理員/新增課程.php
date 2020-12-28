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
$IDcheck="SELECT * FROM user WHERE Name='$newPro' and Number='$newProNum' and Authority='教授'";
$IDchecked=$connect->query($IDcheck);
if($checked->num_rows>0){
    echo('error');
}
else if($IDchecked->num_rows==0){
    echo('IDerror');
}
else{
    $add="INSERT INTO $Sem (Class,Type,Professor,ProfessorNum,Point,Code) VALUES('$newClass','$newType','$newPro','$newProNum','$newPoint','$newCode')" ;
    $connect->query($add);
}

?>
