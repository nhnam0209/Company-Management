<?php
    require_once ('process/dbh.php');
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result))
    {
        $id = $res['id'];
        $pic = $res['pic'];
        $firstname = $res['firstname'];
        $lastname = $res['lastname'];
        $email = $res['email'];
        $pwd = $res['pwd'];
        $phonenumber = $res['phonenumber'];
        $addr = $res['addr'];
        $gender = $res['gender'];
        $DoB = $res['DoB'];
        $dept = $res['dept'];
        $degree = $res['degree'];
    }
}

?>

<html>
<head>
	<title>Employee Information</title>
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
                    <h2 class="title_header">Employee Infomation</h2>
                    <form id = "registration">
                        <div class="row row-space"> 
                            <div class="container_form">
                                <img  style = "border-radius: 50%;" src="process/<?php echo $pic;?>" >
                                <div class="form_text">
                                    <p>Employee ID: <?php echo $id;?></p>
                                    <p>First Name: <?php echo $firstname;?></p>
                                    <p>Last Name: <?php echo $lastname;?></p>
                                    <p>Email: <?php echo $email;?></p>
                                    <p>Date of Birth: <?php echo $DoB;?></p>
                                    <p>Gender: <?php echo $gender;?></p>
                                    <p>Phone Number: <?php echo $phonenumber;?></p>
                                    <p>Address: <?php echo $addr;?></p>
                                    <p>Department: <?php echo $dept;?></p>
                                    <p>Degree: <?php echo $degree;?></p>
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
