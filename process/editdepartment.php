<?php
	session_start();

if(isset($_POST['update']))
{
	require_once 'dbh.php';

	$Did =  $_REQUEST['Did'];
	$dname =  $_REQUEST['dname'];
	$roomnum =  $_REQUEST['roomnum'];
	$eid =  $_REQUEST['eid'];
	$descript =  $_REQUEST['descript'];

    $update = "UPDATE department SET dname='$dname',roomnum='$roomnum',eid='$eid',descript='$descript' WHERE Did = Did";
	

    $result = mysqli_query($conn, $update) or die ( mysqli_error($conn));

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='../viewdepartment.php';
    </SCRIPT>");
}
?>