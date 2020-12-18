<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$select="SELECT * FROM user ORDER BY Number ASC" ;
$memberData = $connect->query($select);
echo json_encode($memberData->fetch_all());
?>