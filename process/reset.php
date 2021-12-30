<?php
	session_start();

if(isset($_POST['reset']))
{
	require_once 'dbh.php';
	$id =  $_REQUEST['id'];
    $pwd = $_REQUEST['pwd'];

    $firstpwd = "123456";

    $hash = password_hash($firstpwd, PASSWORD_BCRYPT);

    $update = "UPDATE employee SET pwd = '$hash', stt = '-1' WHERE id=$id";
	

    $result = mysqli_query($conn, $update) or die ( mysqli_error($conn));

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='../viewemployee.php';
    </SCRIPT>");
}
?>