<?php
    require_once ('process/dbh.php');
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    
	$Did = (isset($_GET['Did']) ? $_GET['Did'] : '');

    $sql1 = "SELECT id, department.eid, department.Did, department.dname, department.roomnum, department.descript, employee.firstname, employee.lastname FROM `department` ,`employee`  WHERE department.Did = Did AND department.eid = id AND employee.id = department.eid ";
    
	$result = mysqli_query($conn, $sql1); 


    echo mysqli_error($conn);

	if($result){
        while($res = mysqli_fetch_assoc($result))
        {
            $firstname = $res['firstname'];
            $lastname = $res['lastname'];
            $Did = $res['Did'];
            $dname = $res['dname'];
            $roomnum = $res['roomnum'];
            $descript = $res['descript'];
        }
    }

?>

<html>
<head>
	<title>Detail Department</title>
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
	
	<div class="divider"></div>
	
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title_header">Department Infomation</h2>
                    <form id = "registration">
                        <div class="row row-space"> 
                            <div class="container_form">
                                <div class="form_text">
                                     <p>Department ID: <?php echo $Did;?></p>

                                     <p>Department Name: <?php echo $dname;?></p>
                                     <p>Name of Leader: <?php echo $firstname;?> <?php echo $lastname;?></p>
                                     <p>Room Number: <?php echo $roomnum;?></p>
                                     <p>Description: <?php echo $descript;?></p>
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
