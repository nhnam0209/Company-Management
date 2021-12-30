<?php

	session_start();

require_once ('dbh.php');
// $id = (isset($_GET['id']) ? $_GET['id'] : '');
// $tid = (isset($_GET['tid']) ? $_GET['tid'] : '');

// $sql = "SELECT tid, eid, tname, deadline, subdate, descript, stt, firstname, lastname FROM `task` ,`employee` WHERE eid = $id AND tid = $tid";

if(isset($_POST['update']))
{
  $eid = $_REQUEST['eid'];
  $tname = $_REQUEST['tname'];
  $deadline = $_REQUEST['deadline'];
  $subdate = $_REQUEST['subdate'];
  $descript = $_REQUEST['descript'];

  
  $update = "UPDATE `task` SET tname = '$tname', deadline = '$deadline',subdate = '$subdate', descript = '$descript'  WHERE eid=$eid ";
 
  $result = mysqli_query($conn, $update);

  echo mysqli_error($conn);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('Succesfully Updated')
  window.location.href='../viewtask.php';
  </SCRIPT>");
}
?>