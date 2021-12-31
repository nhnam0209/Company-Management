<?php

require_once ('process/dbh.php');

$sql = "Select employee.id, employee.firstname, employee.lastname, employeeleave.start, employeeleave.end, employeeleave.reason, employeeleave.stt, employeeleave.token From employee, employeeleave Where employee.id = employeeleave.id order by employeeleave.token";

$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div id="navli"  class="navigation">
            <h1>My Company</h1>
            <div class="navigation-right">
            <a href="adhomepage.php">Home</a>
            <a href="viewemployee.php">Employee</a>
            <a href="viewdepartment.php">Department</a>
            <a href="viewtask.php">Task</a>
            <a href="logout.php">Log Out</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
	</header>


	<div style="overflow-x:auto;" >
        <div class="title_header">
            <h1>
                Employee Leave
            </h1>
        </div>
        <table class = "style-table">
            <thead>
                <tr>
                    <th>Emp. ID</th>
                    <th>Token</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Total Days</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($employee = mysqli_fetch_assoc($result)) {

                $date1 = new DateTime($employee['start']);
                $date2 = new DateTime($employee['end']);
                $interval = $date1->diff($date2);
                $interval = $date1->diff($date2);
                echo "<tr>";
                echo "<td>".$employee['id']."</td>";
                echo "<td>".$employee['token']."</td>";
                echo "<td>".$employee['firstname']." ".$employee['lastname']."</td>";
                echo "<td>".$employee['start']."</td>";
                echo "<td>".$employee['end']."</td>";
                echo "<td>".$employee['reason']."</td>";
                echo "<td>".$employee['stt']."</td>";
                echo "<td>". $interval->days ."</td>";
                echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"reject.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Reject the request?')\">Reject</a> ";

                }
            ?>
            </tbody>

		</table>
	</div>
    <script>
        function myFunction() {
          var x = document.getElementById("navli");
          if (x.className === "navigation") {
            x.className += " responsive";
          } else {
            x.className = "navigation";
          }
        }
    </script>	
</body>
</html>