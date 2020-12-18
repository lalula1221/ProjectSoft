<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem = $_POST['Sem'];
$Code = $_POST['Code'];
$ProfessorNum = $_SESSION['Number'];
$check = "SELECT Class FROM $Sem WHERE Code='$Code' and ProfessorNum='$ProfessorNum'";
$checked = $connect->query($check);
if ($checked->num_rows == 0) {
    echo ('error');
} else {
    $allStudent = "SELECT Name,Number FROM user WHERE Authority='學生'";
    $passFir = $connect->query($allStudent);
    $allStudents = $passFir->fetch_all();
    $number = 0;
    $result = array();
    for ($index = 0; $index < $passFir->num_rows; $index++) {
        $grade = $allStudents[$index][1] . "_學號";
        $elective = $allStudents[$index][1] . "_選修";
        $electiveCheck = "SELECT $elective FROM $Sem WHERE Code='$Code'";
        $passSc = $connect->query($electiveCheck);
        $electiveChecked = $passSc->fetch_row();
        if ($electiveChecked[0] == '是') {
            $gradeGet = "SELECT $grade FROM $Sem WHERE Code='$Code'";
            $passTh = $connect->query($gradeGet);
            $gradeGotton = $passTh->fetch_row();
            $result[$number][0] = $allStudents[$index][0]; //將[number][0] => 姓名
            $result[$number][1] = $allStudents[$index][1]; //將[number][1] => 學號
            $result[$number][2] = $gradeGotton[0]; //將 [number][2] => 分數
            $number++;
        }
    }
    echo json_encode($result);
}
?>