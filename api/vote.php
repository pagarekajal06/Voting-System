<?php
session_start();
include('connect.php');

$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$gid=$_POST['gid'];
$userid=$_SESSION['userdata']['id'];

$update_votes=mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$gid'");
$update_user_status=mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
  $group = mysqli_query($connect, "SELECT * FROM user WHERE role='Group'");       /*fetch all the group data*/
  $groupdata = mysqli_fetch_all($group, MYSQLI_ASSOC);

  $_SESSION['userdata']['status']=1;   # Acess the all data into dashboard
  $_SESSION['groupdata']=$groupdata;

  echo '
     <script>
     alert("Voting Successfull !");
     window.location="../Route/dashboard.php";
     </script>


  ';


}
else{
  echo '
     <script>
     alert("Some Error Occured!");
     window.location="../Route/dashboard.php";
     </script>


  ';
}


 ?>
