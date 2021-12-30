<?php
include("process/dbh.php");

$tid = $_GET['tid'];

$result1 = mysqli_query($conn, "DELETE FROM task WHERE tid=$tid");
header("Location:viewtask.php");

?>
