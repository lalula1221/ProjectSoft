<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$delCode=$_POST['Code'];
$Sem=$_POST['Sem'];
$check="SELECT Code FROM $Sem WHERE Code='$delCode'";
$checked=$connect->query($check);
if($checked->num_rows==0){
    echo('error');
}
else{
    $delete="DELETE FROM $Sem WHERE Code='$delCode'";
    $connect->query($delete);
}
?>