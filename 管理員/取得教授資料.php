<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem=$_POST['Sem'];
$select="SELECT Class,Type,Professor,Point,Code FROM $Sem ORDER BY Professor" ;
$memberData = $connect->query($select);
echo json_encode($memberData->fetch_all());
?>