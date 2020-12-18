<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem = $_POST['Sem'];
$Code = $_POST['Code'];
$TotalStudents = $_POST['Length'];//$_POST={Sem=>$Sem,Code=$Code,Length=$Length,學生1=>分數,學生2=>分數...}
$arrayKey=array_keys($_POST);//arrayKey={0=>Sem,1=>Code,2=>Length,3=>學生....}
for($index=0;$index<$TotalStudents;$index++){
    $student=$arrayKey[$index+3]."_學號";
    $grade=intval($_POST[$arrayKey[$index+3]]);
    $update="UPDATE $Sem SET $student=$grade WHERE Code='$Code'";
    $connect->query($update);
}

?>
