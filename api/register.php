<?php

    include("connect.php");

    #collect the values from Front-end
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $Email = $_POST['Email-ID'];
    $Password = $_POST['Password'];
    $cPassword = $_POST['cPassword'];
    $gender = $_POST['gender'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    if ($Password==$cPassword){
         move_uploaded_file($tmp_name, "../uploads/$image");

  $insert = mysqli_query($connect,
    "INSERT INTO `user` (`name`, `mobile`, `Email-ID`, `Password`, `gender`, `photo`, `role`,
      `status`, `votes`) VALUES ( '$name', '$mobile', '$Email', '$Password', '$gender',
         '$image', '$role', '0', '0')");


        if ($insert){
           echo '
           <script>
           alert("Registration Successfull!");
           window.location="../Route/index.html";
           </script>
           ';
        }
        else {
          echo '
          <script>
          alert("Some Error Occured!");
          window.location="../Route/Regis.html";
          </script>
          ';
        }
   }
    else {
        echo '
           <script>
           alert("Password and Confirm Password does not match!");
           window.location="../Route/Regis.html";
           </script>


        ';
    }

 ?>
