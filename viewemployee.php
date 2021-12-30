<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `employee` ";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

<head>
	<title>Employee</title>
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="title_header">
	    <h1>My Employee</h1>
    </div>
    <div class="buttoncontainer">
        <button id= "addemployee" >Add Employee</button>
        <button id= "employeeleave">Employee Leave</button>
    </div>
	<div class="divider"></div>
    <div style="overflow-x:auto;" >
        <table class = "style-table" >
            <thead>
                <tr>
                    <th align = "center">EID</th>
                    <th align = "center">Name</th>
                    <th align = "center">Email</th>
                    <th align = "center">Date of Birth</th>
                    <th align = "center">Gender</th>
                    <th align = "center">PhoneNumber</th>
                    <th align = "center">Address</th>
                    <th align = "center">Department</th>
                    <th align = "center">Options</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while ($employee = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$employee['id']."</td>";
                        echo "<td>".$employee['firstname']." ".$employee['lastname']."</td>";
                        echo "<td>".$employee['email']."</td>";
                        echo "<td>".$employee['DoB']."</td>";
                        echo "<td>".$employee['gender']."</td>";
                        echo "<td>".$employee['phonenumber']."</td>";
                        echo "<td>".$employee['addr']."</td>";
                        echo "<td>".$employee['dept']."</td>";
                        echo "<td><a href=\"detailemployee.php?id=$employee[id]\">Detail</a> | <a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"resetpassword.php?id=$employee[id]\">Reset Password</a></td>";
                        echo "</tr>";

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
    <script>
        document.getElementById("addemployee").onclick = function(){
            location.href = "/addemployee.php"
        }
        document.getElementById("employeeleave").onclick = function(){
            location.href = "/employeeleave.php"
        }
    </script>	
</body>
</html>