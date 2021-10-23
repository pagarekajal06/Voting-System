<?php
session_start();
include("connect.php");

$mobile =$_POST['mobile'];
$Password=$_POST['Password'];
$role =$_POST['role'];

$check =mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND
  Password='$Password' And role='$role'");

  if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);              /* Access all the user data */
    $group = mysqli_query($connect, "SELECT * FROM user WHERE role='Group'");       /*fetch all the group data*/
    $groupdata = mysqli_fetch_all($group, MYSQLI_ASSOC);      /*Fetch all the group data and with the help of MYSQLI_ASSOC
                                                         -this function arrange the group data in respective order*/

    $_SESSION['userdata']=$userdata;   # Acess the all data into dashboard
    $_SESSION['groupdata']=$groupdata;

    echo '
       <script>
       window.location="../Route/dashboard.php";
       </script>


    ';


  }
  else {
    echo '
       <script>
       alert("Invalid Credentials or User not found !");
       window.location="../Route/index.php";
       </script>


    ';
  }
 ?>
