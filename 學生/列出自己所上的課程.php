<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Number=$_SESSION['Number'];
$Elective=$Number."_選修";
$Grade=$Number."_學號";
$Sem=$_POST['Sem'];
$select="SELECT Class,Type,Professor,Point,Code,$Grade FROM $Sem WHERE $Elective='是'";
$memberdata=$connect->query($select);
$data=$memberdata->fetch_all();
if($memberdata->num_rows==0){
    echo('error');//沒有選修
}
else{
    echo json_encode($data);
}
?>