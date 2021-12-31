
<?php
  require_once ('process/dbh.php');

  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $tid = (isset($_GET['tid']) ? $_GET['tid'] : '');

  $sql = "SELECT * from `task` WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $upfile = $res['upfile'];
}
}

?>

<html>
<head>
	<title>Employee</title>
	<link rel="stylesheet" type="text/css" href="styleemployee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <div class="divider"></div>
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title_header">Submit File</h2>
                    <form id = "registration" action="process/submittask.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">

                        <div class="row">
                          <div class="col-25">
                            <p>Submit File</p>
                          </div>
                          <div class="col-75">
                              <input class="input--style-1" type="file" placeholder="Avatar" name="file">
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
