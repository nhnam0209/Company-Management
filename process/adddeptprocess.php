<?php

require_once ('dbh.php');

$dname = $_POST['dname'];
$eid = $_POST['eid'];
$roomnum = $_POST['roomnum'];
$descript = $_POST['descript'];

$sql = "INSERT INTO department(Did,eid, dname, roomnum,descript ) VALUES (' ','$eid' , '$dname' , '$roomnum', '$descript' )";

$result = mysqli_query($conn, $sql);


if(($result) == 1){
    header("Location: ..//viewdepartment.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Add')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>