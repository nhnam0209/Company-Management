<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `department` ";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

<head>
	<title>Department</title>
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
	    <h1>Department</h1>
    </div>
    <div class="buttoncontainer">
        <button id= "adddepartment">Add Department</button>
    </div>
	<div style="overflow-x:auto;">
        <table class = "style-table">
            <thead>
                <tr>
                <th align = "center">Department ID</th>
                <th align = "center">Leader ID</th>
                <th align = "center">Department Name</th>
                <th align = "center">Options</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while ($department = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$department['Did']."</td>";
                        echo "<td>".$department['eid']."</td>";
                        echo "<td>".$department['dname']."</td>";
                        echo "<td><a href=\"detaildepartment.php?id=$department[eid]&Did=$department[Did]\">Detail</a> | <a href=\"editdepartment.php?id=$department[eid]&Did=$department[Did]\">Edit</a> | <a href=\"deletedepart.php?id=$department[eid]&Did=$department[Did]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
        document.getElementById("adddepartment").onclick = function(){
            location.href = "/adddepartment.php"
        }

    </script>	
</body>
</html>