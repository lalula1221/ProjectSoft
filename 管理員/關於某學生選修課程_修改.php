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
$check="SELECT Number FROM user WHERE Number='$Number'";
$checked=$connect->query($check);
if($checked->num_rows==0){
    echo('error');
}
else{
    $select="SELECT Class,$Elective FROM $Sem";
    $memberdata=$connect->query($select);
    $data=$memberdata->fetch_all();
    echo json_encode($data);
}
//傳回各個科目及某學生的選修狀況
?>

