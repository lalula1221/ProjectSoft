<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem=$_POST['Sem'];
$Code=$_POST['Code'];
$classCheck="SELECT Code FROM $Sem WHERE Code='$Code'";
$classChecked=$connect->query($classCheck);
if($classChecked->num_rows==0){
    echo('error1');//沒有這個課程
}
else{
    $child="SELECT Name,Number FROM user WHERE Authority='學生' ORDER BY Number";
    $passOne=$connect->query($child);
    if($passOne->num_rows==0){
        echo('error2');//沒有學生
    }
    else{
        $number=0;
        $data;
        $children=$passOne->fetch_all();//找出所有學生
        for($index=0;$index<$passOne->num_rows;$index++){
            $Elective=$children[$index][1]."_選修";
            $check="SELECT $Elective FROM $Sem WHERE Code='$Code'";
            $passTwo=$connect->query($check);
            $decision=$passTwo->fetch_row();//$decision[0]=="是or否"
            if($decision[0]=="是"){
                $data[$number][0]=$children[$index][0];//姓名
                $data[$number][1]=$children[$index][1];//學號
                $number++;
            }
        }
        echo json_encode($data);
    }
}
?>