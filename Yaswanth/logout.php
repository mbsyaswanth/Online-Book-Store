<?php
  include 'db_conn.php';
?>

<?php
// Start the session
session_start();
// destroy the session
session_destroy();
//redirect
header('location:index.php');
?>
