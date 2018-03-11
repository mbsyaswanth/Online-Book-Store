<?php
//Code to connect database
 $connect=mysqli_connect("localhost","root","","bookstore");
  if(!$connect)
 $status= "error connecting to database..".mysqli_connect_error();
 else {
 $status= "Connected successfully";
 }
  //echo $status; // to Know whether connected or -
 ?>
