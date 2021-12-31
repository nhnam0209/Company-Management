<?php

require_once ('process/dbh.php');


$sql = "SELECT * FROM `employee` WHERE 1";


//echo "$sql";
$result = mysqli_query($conn, $sql);

if(isset($_POST['update']))
{
  $id = $_REQUEST['id'];
  $old = $_POST['old'];
  $new = $_POST['new'];

  $sqli = "SELECT pwd from `employee`  WHERE id = $id";

  $resulta = mysqli_query($conn, $sqli);
  $empwd = "";

  $hash = password_hash($new,PASSWORD_BCRYPT);

  $employee = mysqli_fetch_array($resulta);
  $empwd = ($employee['pwd']);


  if(password_verify($old,$empwd)){
    $sqla = "UPDATE employee SET pwd = '$hash' WHERE id = $id";
    mysqli_query($conn, $sqla);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Password Updated')
        window.location.href='myprofile.php?id=$id';</SCRIPT>"); 
  
    }
    else{
          echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Update Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
    }
}
?>


<!-- <?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $old = $res['pwd'];
  echo "$old";
}
}

?> -->

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
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Password</h2>
                    <form id = "registration" action="changemypass.php" method="POST">

                          <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Old Password <?php echo $id?></p>
                                     <input class="input--style-1" type="Password" name = "old" required >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>New Password</p>
                                    <input class="input--style-1" type="Password" name="new" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                    
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
