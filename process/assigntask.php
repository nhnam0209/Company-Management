<?php

require_once ('dbh.php');

$tname = $_POST['tname'];
$eid = $_POST['eid'];
$subdate = $_POST['deadline'];

$sql = "INSERT INTO `task`(`eid`, `tname`, `deadline` ,`descript`, `stt`) VALUES ('$eid' , '$tname' , '$subdate' , `$descript`, 'New')";

$result = mysqli_query($conn, $sql);


if(($result) == 1){
    header("Location: ..//viewtask.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
    echo mysqli_error();
}




?>