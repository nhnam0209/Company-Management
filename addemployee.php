<?php
    require_once ('process/dbh.php');
    $sql = "SELECT * from `department`";

    $result = mysqli_query($conn, $sql);


    // if($result){
    //     while ($res = mysqli_fetch_assoc($result)){
    //         $dept = $res['dept'];
    //     }
    // }
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Title Page-->
    <title>Add Employee </title>

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
                    <h2 class="title_header">Add Employee</h2>
                    <div class="container_form">
                    <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="First Name" name="firstname" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Last Name" name="lastname" required="required">
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="DoB" name="DoB" required="required">
                        </div>

                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender">
                                    <option disabled="disabled" selected="selected">GENDER</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Phone Number" name="phonenumber" required="required" >
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="addr" required="required">
                        </div>

                        <div class="input-group">
                            <select name="dept" id="dept">
                            <option disabled="disabled" selected="selected">Department</option>
                                <?php
                                    while ($dept = mysqli_fetch_assoc($result)){
                                        echo "<option value = ".$dept['dname'].">".$dept['dname']."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Degree" name="degree" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Avatar" name="file">
                        </div>

                            <input class="button_submit" type="submit">Submit</input>
                        </form>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <!-- <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script> -->

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
