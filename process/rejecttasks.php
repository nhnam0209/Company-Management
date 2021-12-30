<?php

	session_start();

require_once ('dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$tid = (isset($_GET['tid']) ? $_GET['tid'] : '');

$sql = "SELECT tid, eid, tname, deadline, subdate, descript, task.stt,rating, firstname, lastname FROM `task` ,`employee` WHERE eid = $id AND tid = $tid";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{
  $eid = $_REQUEST['eid'];
  $tid =  $_REQUEST['tid'];
  $tname = $_REQUEST['tname'];
  $deadline = $_REQUEST['deadline'];
  $subdate = $_REQUEST['subdate'];
  $stt = $_REQUEST['stt'];
  $descript = $_REQUEST['descript'];

  
  $update = "UPDATE task SET tname = '$tname', deadline = '$deadline',subdate = '$subdate',stt = '$stt', descript = '$descript', rating = '$rating' WHERE eid=$eid and tid = $tid";
 
  $result = mysqli_query($conn, $update);


  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('Succesfully Updated')
  window.location.href='../viewtask.php';
  </SCRIPT>");
}
?>