<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Number=$_POST['Number'];
$Elective=$Number."_選修";
$Sem=$_POST['Sem'];
$check="SELECT Number FROM user WHERE Number=$Number";
$checked=$connect->query($check);
if($checked->num_rows==0){
    echo('error');
}
else{
    $select="SELECT Class FROM $Sem WHERE $Elective='是'";
    $memberdata=$connect->query($select);
    echo json_encode($memberdata->fetch_all());
}
?>
