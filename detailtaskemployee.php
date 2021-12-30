<?php
    require_once ('process/dbh.php');
	$id = (isset($_GET['id']) ? $_GET['id'] : '');

	$tid = (isset($_GET['tid']) ? $_GET['tid'] : '');

	$sql = "SELECT id, task.tid, task.eid, task.tname, task.deadline, task.subdate, task.stt, task.descript, employee.firstname, employee.lastname FROM `task`,`employee` WHERE task.tid = tid AND task.eid = id AND employee.id = task.eid";


	$result = mysqli_query($conn, $sql) ;
    echo mysqli_error($conn);

	if($result){
        while($res = mysqli_fetch_assoc($result))
        {
            $tid = $res['tid'];
            $id = $res['id'];
            $firstname = $res['firstname'];
            $lastname = $res['lastname'];
            $tname = $res['tname'];
            $deadline = $res['deadline'];
            $subdate = $res['subdate'];
            $stt = $res['stt'];
            $descript = $res['descript'];
        }
    }

?>

<html>
<head>
	<title>Employee</title>
	<link rel="stylesheet" type="text/css" href="styleemployee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
          <div id="navli"  class="navigation">
              <h1>My Company</h1>
              <div class="navigation-right">
              <a href="emphomepage.php?id=<?php echo $id?>">Home</a>
              <a href="myprofile.php?id=<?php echo $id?>">My Profile</a>
              <a href="mytask.php?id=<?php echo $id?>">My Task</a>
              <a href="employeeleave.php?id=<?php echo $id?>">Apply Leave</a>
              <a href="logout.php">Log Out</a>
              <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                  </a>
              </div>
          </div>
    </header>
	
	<div class="divider"></div>
	
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Task Infomation</h2>
                    <form id = "registration">

                        <div class="row row-space"> 
                            <div class="col-2">
                                <div class="input-group">
                                     <p>Task ID: <?php echo $tid;?></p>
                                     <p>Employee ID: <?php echo $id;?></p>
                                     <p>Employee Name: <?php echo $firstname;?> <?php echo $lastname;?></p>
                                     <p>Task Name: <?php echo $tname;?></p>
                                     <p>Deadline: <?php echo $deadline;?></p>
                                     <p>Submission Date: <?php echo $subdate;?></p>
                                     <p>Description: <?php echo $descript;?></p>
                                     <p>Status: <?php echo $stt;?></p>
                                </div>
                            </div>

                        </div> 
                    </form>
                </div>
            </div>
        </div>
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


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
