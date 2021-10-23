<?php

$connect = mysqli_connect("localhost", "root", "", "voting_system") or die("Connection Failed !");


if ($connect) {
   echo "Connected!";
}
else {
   echo "Not Connected!";
}


 ?>
