<?php
include("process/dbh.php");

$Did = $_GET['Did'];


$result2 = mysqli_query($conn, "DELETE FROM department WHERE Did=$Did");
header("Location:viewdepartment.php");


?>
