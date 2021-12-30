<?php
session_start();

require_once ('dbh.php');

$id = $_REQUEST['id'];

$sql = "SELECT firstname,lastname,phonenumber,addr,gender,pic,DoB FROM `employee` WHERE id = $id";

if(isset($_POST['update'])){

    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $phonenumber = $_REQUEST['phonenumber'];
    $addr = $_REQUEST['addr'];
    $gender =  $_REQUEST['gender'];
    $DoB = $_REQUEST['DoB'];

    $files = $_FILES['file'];
    $filename = $files['name'];
    $filrerror = $files['error'];
    $filetemp = $files['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png' , 'jpg' , 'jpeg');

    
    if(in_array($filecheck, $fileextstored)){
        
        $destinationfile = 'images/'.$filename;
        echo $destinationfile;
        
        move_uploaded_file($filetemp , $destinationfile);

        $update = "UPDATE employee SET firstname='$firstname',lastname='$lastname',DoB='$DoB',gender='$gender',phonenumber='$phonenumber',addr='$addr', pic = '$destinationfile' WHERE id=$id";

        $result = mysqli_query($conn, $update) or die (mysqli_error($conn));



        if(($result) == 1){
    
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated')
            window.location.href='..//myprofile.php?id=$id  ';
            </SCRIPT>");
        }
        
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Failed to Add')
            window.location.href='javascript:history.go(-1)';
            </SCRIPT>");
        }   

    
    }
    else
    {
        $update = "UPDATE employee SET firstname='$firstname',lastname='$lastname',DoB='$DoB',gender='$gender',phonenumber='$phonenumber',addr='$addr' WHERE id=$id";

        $result = mysqli_query($conn, $update) or die ( mysqli_error($conn));

        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated')
            window.location.href='..//myprofile.php?id=$id  ';
            </SCRIPT>");
    }        




}
?>
