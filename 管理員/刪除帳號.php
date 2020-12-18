<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Number=$_POST['Number'];
$Num=$Number."_學號";
$Elective=$Number."_選修";
$DeleteInUserTable="DELETE FROM user WHERE Number='$Number'";
$selectAuth="SELECT Authority FROM user WHERE Number='$Number'";
$get= $connect->query($selectAuth);
$auth=$get->fetch_row();
$check="SELECT Number FROM user WHERE Number='$Number'";
$checked=$connect->query($check);
if($checked->num_rows==0){
    echo("error");
}
else{
    if($auth[0]=='學生'){
        $DeleteIn109upE="ALTER TABLE 109上 DROP COLUMN $Elective";
        $connect->query($DeleteIn109upE);
        $DeleteIn109up="ALTER TABLE 109上 DROP COLUMN $Num";
        $DeleteIn109downE="ALTER TABLE 109下 DROP COLUMN $Elective";
        $connect->query($DeleteIn109downE);
        $DeleteIn109down="ALTER TABLE 109下 DROP COLUMN $Num";
        $DeleteIn110upE="ALTER TABLE 110上 DROP COLUMN $Elective";
        $connect->query($DeleteIn110upE);
        $DeleteIn110up="ALTER TABLE 110上 DROP COLUMN $Num";
    }
    else{
        $DeleteIn109up="DELETE FROM 109上 WHERE ProfessorNum='$Number'";
        $DeleteIn109down="DELETE FROM 109下 WHERE ProfessorNum='$Number'";
        $DeleteIn110up="DELETE FROM 110上 WHERE ProfessorNum='$Number'";
    }
    $connect->query($DeleteInUserTable);
    $connect->query($DeleteIn109up);
    $connect->query($DeleteIn109down);
    $connect->query($DeleteIn110up);
    echo("success");
}
?>