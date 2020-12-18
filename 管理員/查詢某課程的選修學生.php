<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem = $_POST['Sem'];
$Code = $_POST['Code'];
$check="SELECT Code FROM $Sem WHERE Code='$Code'";
$checked=$connect->query($check);
if($checked->num_rows==0){
    echo('error');
}
else{
    $select = "SELECT Name,Number FROM user WHERE Authority='學生'"; //先找所有學生
    $memberdata = $connect->query($select);
    $students = $memberdata->fetch_all();//從user取出的所有學生
    $studentsE=array();//放有選修本門課的學生
    $number=0;
    for($index=0;$index<$memberdata->num_rows;$index++){
        $student=$students[$index][1]."_選修";
        $select="SELECT $student FROM $Sem WHERE Code='$Code'";
        $memberData = $connect->query($select);
        $decision=$memberData->fetch_all();
        if(sizeof($decision)>0){
        if($decision[0][0]=='是'){
        $studentsE[$number]=$students[$index][0];
        $number++;
        }}
    }
    echo(json_encode($studentsE));
}
?>