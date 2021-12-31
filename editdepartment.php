<?php
	require_once 'process/dbh.php';

    $Did = $_REQUEST['Did'];
	$sql = "SELECT * from `department` WHERE Did=$Did";
	$result = mysqli_query($conn, $sql) or die ( mysqli_error());
	if($result){
	while($row = mysqli_fetch_assoc($result))
    {
        $eid = $row['eid'];
        $dname = $row['dname'];
        $roomnum = $row['roomnum'];
        $descript = $row['descript'];
    }
}

?>

<html>
<head>
	<title>Update Department</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
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
                    <h2 class="title_header">Update Department Infomation</h2>
                    <form id = "registration" action="process/editdepartment.php" method="POST">

                        <div class="row row-space">
                            <div class="container_form_edit">
                                <div class="form_text">
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="dname">Department Name </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" id ="dname" name="dname" value="<?php echo $dname;?>" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="eid">Leader ID: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="eid" value="<?php echo $eid;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="roomnum">Room Number: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="roomnum" value="<?php echo $roomnum;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="descript">Description: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text"  name="descript" value="<?php echo $descript;?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>

                                    <div class="row">
                                        <button  type="submit" name="update" id="update">Update</button>
                                    </div>

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
