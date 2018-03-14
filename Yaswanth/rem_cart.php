<?php
  include 'db_conn.php';
?>

<?php
$id=htmlspecialchars($_GET["cid"]);
$query="DELETE FROM `cart` WHERE cart_id='$id'";
$result=mysqli_query($connect,$query);
if($result){
  echo "successfully deleted from cart";
}else{
  echo "failed to delete";
}

?>
