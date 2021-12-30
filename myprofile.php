<?php
    session_start();

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
              <a href="myemployeeleave.php?id=<?php echo $id?>">Apply Leave</a>
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
                    <h2 class="title">Employee Infomation</h2>
                    <form id = "registration" method="POST" action="editmyprofile.php?id=<?php echo $id?>">

                        <div class="row row-space"> 
                            <div class="col-2">
                                <div class="input-group">
                                     <img src="process/<?php echo $pic;?>" >
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
                                     <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                                     <div class="p-t-20">
                                        <button class="btn btn--radius btn--green"  name="send" >Update Info</button>
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
