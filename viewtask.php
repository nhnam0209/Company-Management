<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `task` order by subdate desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Task</title>
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
    <h1>Task Status</h1>
  </div>
        <div class="buttoncontainer">
            <button id= "addtask" >Add Task</button>
        </div>		
        <div style="overflow-x:auto;">
          <table class = "style-table">
            <thead>
              <tr>
                    <th align = "center">Task ID</th>
                    <th align = "center">Emp. ID</th>
                    <th align = "center">Task Name</th>
                    <th align = "center">Deadline Date</th>
                    <th align = "center">Status</th>
                    <th align = "center">Option</th>
              </tr>
            </thead>
            <tbody>
                <?php
                while ($task = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>".$task['tid']."</td>";
                  echo "<td>".$task['eid']."</td>";
                  echo "<td>".$task['tname']."</td>";
                  echo "<td>".$task['deadline']."</td>";
                  echo "<td>".$task['stt']."</td>";
                  echo "<td><a href=\"detailtask.php?id=$task[eid]&tid=$task[tid]\">Detail</a> | <a href=\"edittask.php?id=$task[eid]&tid=$task[tid]\">Edit</a> | <a href=\"deletetask.php?tid=$task[tid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
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
        document.getElementById("addtask").onclick = function(){
            location.href = "/addtask.php"
        }
    </script>	
	
</body>

</html>