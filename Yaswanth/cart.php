<?php
  include 'db_conn.php';
?>
<?php
// Start the session
session_start();
?>
<?php
$a=isset($_SESSION['user']);
if($a){
   $id=htmlspecialchars($_GET["id"]);
   $quantity=$_POST['quantity'];
   $user=$_SESSION['user'];
   $query="INSERT INTO `cart`(`usr_email`, `book_id`, `book_quantity`) ";
   $query.="VALUES ('$user','$id','$quantity')";
   $result=mysqli_query($connect,$query);
   if($result){
     echo "<script>alert('Successfully added to cart');</script>";
     echo "<script>window.location.href = 'index.php';</script>";
   }

}else{
  echo "<script>alert('Please login first');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
}
?>
