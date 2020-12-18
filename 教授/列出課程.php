<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd =$_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem=$_POST['Sem'];
$Num=$_SESSION['Number'];
$select="SELECT Class,Type,Point,Code FROM $Sem WHERE ProfessorNum='$Num'";
$memberdata=$connect->query($select);
echo json_encode($memberdata->fetch_all())
?>