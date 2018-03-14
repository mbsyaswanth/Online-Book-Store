<?php
  include 'db_conn.php';
?>

<?php
$id=htmlspecialchars($_GET["cid"]);
$query="DELETE FROM `cart` WHERE cart_id='$id'";
$result=mysqli_query($connect,$query);
if($result){
  echo "successfully deleted from cart";
  echo "<script>alert('Successfully removed from cart');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
}else{
  echo "failed to delete";
  echo "<script>alert('failed to delete from cart');</script>";
  echo "<script>window.location.href = 'index.php';</script>";
}

?>
