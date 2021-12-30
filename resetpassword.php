<?php
	require_once 'process/dbh.php';

    $id = $_REQUEST['id'];
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql) or die ( mysqli_error());
	if($result){
	while($row = mysqli_fetch_assoc($result))
    {
        $pwd = $row['pwd'];
    }
}

?>



<html>
<head>
	<title>Admin</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
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
                    <h2 class="title_header">Reset Employee Password</h2>
                    <form id = "registration" action="process/reset.php" method="POST">

                        <div class="container_form_edit">
                            <div class="form_text">
                                <div class="row">
                                    <h2>Please choose "Reset Password" button to reset password for employee</h2>

                                </div>
                            </div>
                            <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>

                            <div class="row">
                                <button  type="submit" name="reset" id="reset">Reset Password </button>
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
</body>
</html>
