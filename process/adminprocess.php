<?php
    require_once ('dbh.php');
    session_start();

    $email = $_POST['mailid'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * from `adminlogin` WHERE email = '$email' AND pwd = '$pwd'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        header("Location: ..//adhomepage.php");
    }
    
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Invalid Email or Password')
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
?>