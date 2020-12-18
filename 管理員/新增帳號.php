<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midTest';
$connect = new mysqli($host, $user, $passwd, $database);
$newacc=$_POST['newAccount'];
$newpas=$_POST['newPassword'];
$newauth=$_POST['newAutho'];
$newname=$_POST['newName'];
$newnum=$_POST['newNumber'];
$newenter=$_POST['newEnter'];
$check="SELECT Password,Number FROM user WHERE Password='$newpas' or Number='$newnum'";//確認是否有重複的密碼或學號
$checked=$connect->query($check);
if($checked->num_rows>0){
    echo("error");
}
else{
    $num=$newnum."_學號";
    $elective=$newnum."_選修";
    $addUserInUserTable="INSERT INTO user VALUES('$newacc','$newpas','$newauth','$newname','$newnum','$newenter')";
    $connect->query($addUserInUserTable);//在user增加用戶(橫)
    $addUser="CREATE USER '$newacc'@'localhost' IDENTIFIED BY '$newpas'";
    $connect->query($addUser);
    $connect->query("GRANT ALL PRIVILEGES ON midtest.* TO '$newacc'@'localhost';");
    $connect->query("FLUSH PRIVILEGES;");//創sql帳號與更新權限
    if($newauth=="學生"){
        $connect->query("ALTER TABLE 109上 ADD $num INT(3) DEFAULT 0");
        $connect->query("ALTER TABLE 109上 ADD $elective VARCHAR(4) DEFAULT '否'");
        $connect->query("ALTER TABLE 109下 ADD $num INT(3) DEFAULT 0");
        $connect->query("ALTER TABLE 109下 ADD $elective VARCHAR(4) DEFAULT '否'");
        $connect->query("ALTER TABLE 110上 ADD $num INT(10) DEFAULT 0");
        $connect->query("ALTER TABLE 110上 ADD $elective VARCHAR(4) DEFAULT '否'");//在每個學期增加學生(直)
    }
    echo("success");
}
?>