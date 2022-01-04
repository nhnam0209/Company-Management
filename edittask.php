<?php
  require_once ('process/dbh.php');
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $tid = (isset($_GET['tid']) ? $_GET['tid'] : '');

  $sql1 = "SELECT id, task.tid,task.eid, task.tname, task.deadline, task.subdate, task.stt, task.descript, employee.firstname, employee.lastname FROM `task` ,`employee`  WHERE task.eid = $id AND task.tid = $tid AND employee.id = task.eid ";

  $result1 = mysqli_query($conn, $sql1);
  if($result1){
    while($res = mysqli_fetch_assoc($result1))
    {
        $tname = $res['tname'];
        $deadline = $res['deadline'];
        $subdate = $res['subdate'];
        $firstname = $res['firstname'];
        $lastname = $res['lastname'];
        $stt = $res['stt'];
        $eid = $res['eid'];
        $tid = $res['tid'];
        $descript = $res['descript'];
    }
}

?>

<html>
<head>
	<title>Edit Task</title>
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
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title_header">Edit Task</h2>
                    <form id = "registration" action="process/edittasks.php" method="POST">

                        <div class="container_form_edit">
                          <div class="form_text">
                              <div class="row">
                                  <div class="col-25">
                                      <label for="dname">Task Name</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="text"  name="tname" value="<?php echo $tname;?>" >
                                  </div>
                              </div>  
                              <div class="row">
                                  <div class="col-25">
                                      <label for="eid">Employee ID</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="text" name="eid" value="<?php echo $eid;?>">
                                  </div>
                              </div>   
                              <div class="row">
                                  <div class="col-25">
                                      <label for="firstname" >Employee Name</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="text" name="firstname" disabled="disabled" value="<?php echo $firstname;?> <?php echo $lastname;?>">
                                  </div>
                              </div>   
                              <div class="row">
                                  <div class="col-25">
                                      <label for="deadline">Deadline</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="date" name="deadline" value="<?php echo $deadline;?>">
                                  </div>
                              </div> 
                              <div class="row">
                                  <div class="col-25">
                                      <label for="subdate">Submission Date</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="date" name="subdate" value="<?php echo $subdate;?>">
                                  </div>
                              </div>      
                              <div class="row">
                                  <div class="col-25">
                                      <label for="deadline">Status</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="text" name="stt"  disabled="disabled" value="<?php echo $stt;?>">
                                  </div>
                              </div>     
                              <div class="row">
                                  <div class="col-25">
                                      <label for="descript">Description</label>
                                  </div>
                                  <div class="col-75">
                                    <input class="input--style-1" type="text" name="descript" value="<?php echo $descript;?>">
                                  </div>
                              </div>  
                              <div class="row">
                                    <button  type="submit" name="update" id="update">Update</button>
                              </div>       
                          </div>
                        </div>
                       

                    </form>
                    <br>
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