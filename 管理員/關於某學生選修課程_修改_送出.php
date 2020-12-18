<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Num=$_POST['Number'];
$Number=$Num."_學號";
$Elective=$Num."_選修";
$Sem=$_POST['Sem'];
$Select="SELECT Class FROM $Sem";
$memberdata=$connect->query($Select);
$classes=$memberdata->fetch_all();//為二維陣列
for($index=0;$index<$memberdata->num_rows;$index++){
    $choose=$_POST[$classes[$index][0]];//找出POST裡的對應科目的選修情形 是or否
    $subject=$classes[$index][0];//找出科目
    $Set="UPDATE $Sem SET $Elective='$choose' WHERE Class='$subject'";
    $connect->query($Set);
    //選擇學期、學生、及其選修情況欄位後，將其選修情況更新
}
?>
