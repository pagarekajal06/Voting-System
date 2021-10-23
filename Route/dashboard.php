<?php

session_start();
if (!isset($_SESSION['userdata'])) {
 header("location : ../");
}

 $userdata=$_SESSION['userdata'];
  $groupdata= $_SESSION['groupdata'];
  if($_SESSION['userdata']['status']==0){
    $status='<b style= "color:red"> Not Voted</b>';
  }
  else {
       $status='<b  style= "color:green" >  Voted</b>';
  }
 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Voting System- Dashboard</title>
     <link rel="stylesheet" href="index.css">
  </head>
<style media="screen">
  .btn1{
    margin-top: 10px;
    margin-left: 10px;
    margin: 10px;
  }
  .btn2{
    float: right;
    margin-top: 10px;
    margin-right: 10px;
    margin: 10px;
  }
  #profile{
    margin-top: 40px;
    margin-left: 20px;
    background-color: white;
    width: 30%;
    padding: 20px;
    align-items: center;
    float: left;
  }
  #group{
    float: right;
    margin-top: 40px;
    margin-left: 20px;
    background-color: white;
    height: 100%;
    width: 50%;
    padding: 20px;
  }
  .grouppanel{
    padding: 20px;
  }

   #votebtn{

     width: 70px;
     height: 30px;
     background-color: #3498db;
     border:1px solid black;
     border-radius: 5px;
     padding: 5px;
     color: white;
   }
   #Voted{
     width: 70px;
     height: 30px;
     background-color: green;
     border:1px solid black;
     border-radius: 5px;
     padding: 5px;
     color: white;
   }
</style>
  <body>
    <div class="mainsection">
      <div class="dd">
        <a href="../"><button type="button" id="btn" class="btn1" name="button">Back</button></a>
        <a href="Logout.php"><button type="button" id="btn" class="btn2" name="button">Logout</button></a>
        <h1 align="center">Online Voting System</h1>
        <hr></hr>
      </div>
      <div class="grouppanel">
        <div id="profile">
         <center><img src="../uploads/<?php echo $userdata['photo'] ?>" width="100px" height="100px"></center>
                 <br><br>
          <b>Name: </b><?php echo $userdata['name'] ?><br><br>
          <b>Mobile: </b><?php echo $userdata['mobile'] ?><br><br>
          <b>Gender: </b><?php echo $userdata['gender'] ?><br><br>
          <b>Status: </b><?php  echo $status ?><br><br>

        </div>
        <div id="group">
          <?php
          if($_SESSION['groupdata']){
                for ($i=0; $i<count($groupdata); $i++) {
                  ?>
                    <div class="group">
                      <img style="float:right"src="../uploads/<?php echo $groupdata[$i]['photo'] ?>" float="right" height="100px" width="100px" alt="">
                      <b>Group Name: </b><?php echo $groupdata[$i]['name']  ?><br><br>
                      <b>Votes: </b><?php echo $groupdata[$i]['votes']  ?><br><br>
                      <form action="../api/vote.php" method="post">
                        <input type="hidden" name="gvotes" value=" <?php echo $groupdata[$i]['votes'] ?>">
                        <input type="hidden" name="gid" value=" <?php echo $groupdata[$i]['id'] ?>">
                        <?php
                           if ($_SESSION['userdata']['status']==0){
                             ?>
                             <input type="submit" name="votebtn" value="Vote" id="btn">
                             <?php
                           }
                           else{
                             ?>
                             <button disabled type="button" name="votebtn" id="Voted">Voted</button>
                             <?php
                           }

                         ?>

                      </form>
                      <br>
                      <hr>
                    </div>
                  <?php
                }
          }
          else {

          }
           ?>
        </div>
      </div>


      </div>


  </body>
</html>
