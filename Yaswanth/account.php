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
<p>Name:<?php echo $row['usr_name']; ?></p>
<p>Email:<?php echo $row['usr_email']; ?></p>
<p>Phone:<?php echo $row['usr_phone']; ?></p>
<p><a href="logout.php">Logout</a></p>
