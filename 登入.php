<?php
session_start();
$host = 'localhost';
$user = 'root';
$passwd = 'sa9900001';
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$acc=$_POST['account'];
$pas=$_POST['password'];
$select="SELECT * FROM user WHERE Account = '$acc' and Password = '$pas'" ;
$memberData = $connect->query($select);
$data=$memberData->fetch_assoc();
if ($memberData->num_rows > 0) {
    $_SESSION['Account']=$data['Account'];
    $_SESSION['Password']=$data['Password'];
    $_SESSION['Authority']=$data['Authority'];
    $_SESSION['Name']=$data['Name'];
    $_SESSION['Number']=$data['Number'];
    $_SESSION['EnterTime']=$data['EnterTime'];
    echo json_encode($data);
} else {
    $data['Authority']="error";
    echo json_encode($data);
}
?>

