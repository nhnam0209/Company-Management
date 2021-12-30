<?php
//including the database connection file
include("process/dbh.php");

$id = $_GET['id'];

$tid = $_GET['tid'];

$result = mysqli_query($conn, "UPDATE task SET stt = 'In Progress' WHERE tid = $tid AND eid = $id;");

echo mysqli_error($conn)
header("Location:mytask.php?id=$id");

?>

