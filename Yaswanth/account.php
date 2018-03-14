<?php
// Start the session
session_start();
?>
<?php
  include 'db_conn.php';
?>
<?php
  $user=$_SESSION['user'];
  $query="SELECT * FROM `login` WHERE usr_email='$user'";
  $result=mysqli_query($connect,$query);
  $row=mysqli_fetch_assoc($result);
?>
<div class="adetails">
   <div class="aholder">
    <div class="item"><span>Name:</span><?php echo $row['usr_name']; ?></div>
    <div class="item"><span>Email:</span><?php echo $row['usr_email']; ?></div>
    <div class="item"><span>Phone:</span><?php echo $row['usr_phone']; ?></div>
    <div class="item"><a class="abutton" href="logout.php">Logout</a></div>
  </div>
</div>
