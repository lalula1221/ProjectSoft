<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem=$_POST['Sem'];
$Number=$_POST['Number']."_學號";
$Elective=$_POST['Number']."_選修";
$select = "SELECT Class FROM $Sem WHERE $Elective='是'";
$memberdata=$connect->query($select);
$classes=$memberdata->fetch_all();
for($index=0;$index<$memberdata->num_rows;$index++){
    $grade=intval($_POST[$classes[$index][0]]);
    $class=$classes[$index][0];
    $set="UPDATE $Sem SET $Number=$grade WHERE Class='$class'";
    $connect->query($set);
}
?>