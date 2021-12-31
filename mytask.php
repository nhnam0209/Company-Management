<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `task` where eid = '$id' AND stt != 'Cancel'";
	$result = mysqli_query($conn, $sql);
	
?>



<html>
<head>
	<title>Employee</title>
	<link rel="stylesheet" type="text/css" href="styleemployee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
<header>
          <div id="navli"  class="navigation">
              <h1>My Company</h1>
              <div class="navigation-right">
              <a href="emphomepage.php?id=<?php echo $id?>">Home</a>
              <a href="myprofile.php?id=<?php echo $id?>">My Profile</a>
              <a href="mytask.php?id=<?php echo $id?>">My Task</a>
              <a href="myemployeeleave.php?id=<?php echo $id?>">Apply Leave</a>
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

	  <div style="overflow-x:auto;">
		<table class = "style-table">
			<thead>
				<tr>

				<th align = "center">Task ID</th>
				<th align = "center">Task Name</th>
				<th align = "center">Deadline</th>
				<th align = "center">Submission Date</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
				</tr>
			</thead>
			<tbody>
				<?php
						while ($task = mysqli_fetch_assoc($result)) {

							echo "<tr>";
							echo "<td>".$task['tid']."</td>";
							echo "<td>".$task['tname']."</td>";
							echo "<td>".$task['deadline']."</td>";
							echo "<td>".$task['subdate']."</td>";
							echo "<td>".$task['stt']."</td>";
							
							echo "<td><a href=\"detailtaskemployee.php?tid=$task[tid]&id=$task[eid]\">Detail</a> | <a href=\"start.php?tid=$task[tid]&id=$task[eid]\">Start</a> | <a href=\"submit.php?tid=$task[tid]&id=$task[eid]\">Submit</a>";

						}
					?>
			</tbody>
			</table>
	  </div>
		

		</body>
</html>