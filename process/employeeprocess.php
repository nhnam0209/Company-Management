<?php

require_once ('dbh.php');

$email = $_POST['mailid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * from `employee` WHERE email = '$email'";
$sqlid = "SELECT id from `employee` WHERE email = '$email'";
$sqlpwd = "SELECT pwd from `employee` WHERE email = '$email'";
$sqlstt = "SELECT stt from `employee` WHERE  email = '$email'";


$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);
$repwd = mysqli_query($conn , $sqlpwd);
$restt = mysqli_query($conn , $sqlstt);

$empid = "";
$empwd = "";
$empstt = "";


$hashpwd = password_hash($pwd, PASSWORD_BCRYPT);


if(mysqli_num_rows($result) == 1){
	$employee = mysqli_fetch_array($id);
    $cpwd = mysqli_fetch_array($repwd);
    $cstt = mysqli_fetch_array($restt);
	$empid = ($employee['id']);
    $empwd = ($cpwd['pwd']);
    $empstt = ($cstt['stt']);

    
    if(password_verify($pwd, $empwd) AND $empstt == '-1'){
        $sqla = "UPDATE employee SET stt = 0 WHERE email = $email";
        mysqli_query($conn, $sqla);
        header("Location: ..//changepassword1st.php?id=$empid");
    }
    else{
        header("Location: ..//emphomepage.php?id=$empid");
        
    }
    echo mysqli_error($conn);

}

else{
	// echo ("<SCRIPT LANGUAGE='JavaScript'>
    // window.alert('Invalid Email or Password')
    // window.location.href='javascript:history.go(-1)';
    // </SCRIPT>");
    // $cpwd = mysqli_fetch_array($repwd);

    // $empwd = ($cpwd['pwd']);
    // echo $empwd;

    echo mysqli_error($conn);
}
?>