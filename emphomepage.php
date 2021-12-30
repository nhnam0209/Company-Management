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
          $firstname = $res['firstname'];
          $lastname = $res['lastname'];
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
    <div class="container"> 
      <div class="text_container">
        <h1>Welcome Back  <?php echo $firstname;?> <?php echo $lastname;?></h1>
      </div>
      <div class="divider"></div>
      <div class="img_container">
        <img src="assets/employeehomepage.png" alt="">
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