<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];
$token = $_GET['token'];

//deleting the row from table
$result = mysqli_query($conn, "UPDATE employeeleave SET stt ='Reject' WHERE id = $id AND token = $token;");

//redirecting to the display page (index.php in our case)
header("Location:employeeleave.php");
?>

