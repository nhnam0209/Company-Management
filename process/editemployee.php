<?php
	session_start();

if(isset($_POST['update']))
{
	require_once 'dbh.php';
	$id =  $_REQUEST['id'];
	$firstname =  $_REQUEST['firstname'];
	$lastname =  $_REQUEST['lastname'];
	$email =  $_REQUEST['email'];
	$DoB =  $_REQUEST['DoB'];
    $pwd =  $_REQUEST['pwd'];
    $gender =  $_REQUEST['gender'];
	$phonenumber =  $_REQUEST['phonenumber'];
	$addr =  $_REQUEST['addr'];
	$dept = $_REQUEST['dept'];
	$degree = $_REQUEST['degree'];

    $update = "UPDATE employee SET firstname='$firstname',lastname='$lastname',email='$email',DoB='$DoB',pwd = '$pwd',gender='$gender',phonenumber='$phonenumber',addr='$addr',dept='$dept',degree='$degree' WHERE id=$id";
	

    $result = mysqli_query($conn, $update) or die ( mysqli_error($conn));

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='../viewemployee.php';
    </SCRIPT>");
}
?>