<?php

require_once ('dbh.php');

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$addr = $_POST['addr'];
$gender = $_POST['gender'];
$dept = $_POST['dept'];
$degree = $_POST['degree'];
$DoB =$_POST['DoB'];


$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');

$firstpwd = "123456";
$pwd = password_hash($firstpwd,PASSWORD_BCRYPT);

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);

    $sql = "INSERT INTO `employee`(`id`, `firstname`, `lastname`, `email`, `pwd`, `DoB`, `gender`, `phonenumber`,  `addr`, `dept`, `degree`, `pic`) VALUES ('$id','$firstname','$lastname','$email','$pwd','$DoB','$gender','$phonenumber','$addr','$dept','$degree','$destinationfile')";

$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewemployee.php';
    </SCRIPT>");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Add')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

}

else{
    $sql = "INSERT INTO `employee`(`id`, `firstname`, `lastname`, `email`, `pwd`, `DoB`, `gender`, `phonenumber`, `addr`, `dept`, `degree`, `pic`) VALUES ('','$firstname','$lastname','$email','$pwd','$DoB','$gender','$phonenumber','$addr','$dept','$degree','images/no.jpg')";
    $result = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    if(($result) == 1){
        
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='..//viewemployee.php';
        </SCRIPT>");
    }

    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Failed to Add')
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
}

?>