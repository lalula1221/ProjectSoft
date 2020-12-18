<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$oldNum=$_POST['oldNum'];
$check="SELECT Number FROM user WHERE Number='$oldNum'";
$checked=$connect->query($check);//確認有無重複學號
if($checked->num_rows==0){
    echo('error');
}
else{
$newName=$_POST['newName'];
$newNum=$_POST['newNum'];
$newSem=$_POST['newSem'];
$modifyDataUserTable="UPDATE user set Name='$newName',Number='$newNum',EnterTime='$newSem' where Number='$oldNum'";
$connect->query($modifyDataUserTable);
}
?>