<?php
	require_once 'process/dbh.php';

    $id = $_REQUEST['id'];
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql) or die ( mysqli_error());
	if($result){
	while($row = mysqli_fetch_assoc($result))
    {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $pwd = $row['pwd'];
        $phonenumber = $row['phonenumber'];
        $addr = $row['addr'];
        $gender = $row['gender'];
        $DoB = $row['DoB'];
        $dept = $row['dept'];
        $degree = $row['degree'];
    }
}

?>

<?php
    require_once ('process/dbh.php');
    $sql = "SELECT * from `department`";

    

    $result = mysqli_query($conn, $sql);



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
                    <h2 class="title_header">Update Employee Infomation</h2>
                    <form id = "registration" action="process/editemployee.php" method="POST">

                        <div class="row row-space">
                            <div class="container_form_edit">
                                <div class="form_text">
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="firstname">First Name:</label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" id ="firstname" name="firstname" value="<?php echo $firstname;?>" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lastname">Last Name: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="lastname" value="<?php echo $lastname;?>">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="email">Email: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="DoB">Date of Birth: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="date" name="DoB" value="<?php echo $DoB;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="gender">Gender: </label>
                                        </div>
                                        <div class="col-75">
                                            <select name="gender" id="gender">
                                                <option disabled="disabled" selected="selected">
                                                    <?php
                                                        echo $gender
                                                    ?>
                                                </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="pwd">Password: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="pwd" value="<?php echo $pwd;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="phonenumber">Phone Number: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="phonenumber" value="<?php echo $phonenumber;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="addr">Address: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="addr" value="<?php echo $addr;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="dept">Department: </label>
                                        </div>
                                        <div class="col-75">
                                            <select name="dept" id="dept">
                                                <option disabled="disabled" selected="selected">
                                                    <?php
                                                        echo $dept
                                                    ?>
                                                </option>
                                                    <?php
                                                        while ($dept = mysqli_fetch_assoc($result)){
                                                            echo "<option value = ".$dept['dname'].">".$dept['dname']."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="degree">Degree: </label>
                                        </div>
                                        <div class="col-75">
                                            <input class="input--style-1" type="text" name="degree" value="<?php echo $degree;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                        </div>
                                        <div class="col-75">
                                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <button type="submit" name="update" id="update">Submit</button>
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
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script>
</body>
</html>
