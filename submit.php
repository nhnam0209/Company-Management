<?php

require_once ('process/dbh.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$id = $_GET['id'];
$tid = $_GET['tid'];

$date = date('Y-m-d');
//echo "$date";
$sql = "UPDATE task SET subdate= '$date',stt='Waiting' WHERE tid = $tid AND eid = $id;";

$result = mysqli_query($conn , $sql);
echo mysqli_error($conn);

header("Location: mytask.php?id=$id");
?>