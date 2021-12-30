<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];
$tid = $_GET['tid'];

//deleting the row from table
$result = mysqli_query($conn, "UPDATE task SET subdate= '0000-00-00', stt ='Reject', descript = 'Do again' WHERE eid = $id AND tid = $tid;");


//redirecting to the display page (index.php in our case)
header("Location:viewtask.php");
?>

