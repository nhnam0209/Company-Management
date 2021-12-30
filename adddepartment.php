<!DOCTYPE html>
<html>

<head>
	<title>Add Department</title>
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
                    <h2 class="title_header">Add Department</h2>
                    <form action="process/adddeptprocess.php" method="POST" enctype="multipart/form-data">
                        <div class="container_form">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Employee Leader ID" name="eid" required="required">
                            </div>

                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Department Name" name="dname" required="required">
                            </div>

                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Room Number" name="roomnum">
                            </div>

                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Description" name="descript">
                            </div>

                            <input class="button_submit" type="submit">Submit</input>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
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
<!-- end document-->
