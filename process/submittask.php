<?php

require_once ('dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$tid = (isset($_GET['tid']) ? $_GET['tid'] : '');

$id = $_REQUEST['id'];

// $tid = $_REQUEST['tid'];

$date = date('Y-m-d');
//echo "$date";


if(isset($_POST['update'])){

    // $sql = "UPDATE task SET subdate= '$date',stt='Waiting' WHERE tid = $tid AND eid = $id;";
    
    $files = $_FILES['file'];
    $filename = $files['name'];
    $filrerror = $files['error'];
    $filetemp = $files['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('txt', 'docx');

    if(in_array($filecheck, $fileextstored)){
        
        $destinationfile = 'upload/'.$filename;
        echo $destinationfile;
        
        move_uploaded_file($filetemp , $destinationfile);

        $update = "UPDATE task SET subdate= '$date',stt='Waiting',upfile = '$destinationfile' WHERE eid = $id";

        $result = mysqli_query($conn, $update) or die (mysqli_error($conn));



        if(($result) == 1){
    
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated')
            window.location.href='..//mytask.php?id=$id  ';
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
        $update = "UPDATE task SET subdate='$date',stt='Waiting',upfile = 'Nothing' WHERE tid = $tid AND eid = $id";

        $result = mysqli_query($conn, $update) or die ( mysqli_error($conn));

        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Succesfully Updated')
            window.location.href='..//mytask.php?id=$id  ';
            </SCRIPT>");
    }   
}


?>