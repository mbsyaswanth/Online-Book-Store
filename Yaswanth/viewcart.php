
<?php
  include 'db_conn.php';
?>
<?php
//check if user logged in
$a=isset($_SESSION['user']);
if(!$a)
{
  echo "<script>alert('Please login first');</script>";
  echo "<script>window.location.href = 'index.php'; </script>";
}
 ?>
<?php
  $user=$_SESSION['user'];
  $query="SELECT * FROM `cart` WHERE usr_email='$user'";
  $user_cart=mysqli_query($connect,$query);

 ?>

 <div class="bcontainer">
   <?php
   while($c_row = mysqli_fetch_array($user_cart)) {
      $book=$c_row['book_id'];
      $bquery="SELECT * FROM `book` WHERE book_id='$book'";
      $bresult=mysqli_query($connect,$bquery);
   while ($row = mysqli_fetch_array($bresult)) { ?>
   <div class="box">
    <div class="bimg">
      <img src="images/<?php echo $row['book_img']; ?>" class="" alt="html-css-book">
    </div>
    <div class="bdesc">
       <div class="btitle">
         <span><?php echo $row['book_name']; ?></span>
       </div>
      <ul>
        <li><span>Author:</span><?php echo $row['book_author']; ?></li>
        <li><span>Publisher:</span><?php echo $row['book_publisher']; ?></li>
        <li><span>Price:</span><?php echo $row['book_price']; ?></li>
        <form method="post" action="rem_cart.php?id=<?php echo $row['book_id']; ?>&cid=<?php echo $c_row['cart_id']; ?>">
          <li>
            <input type="number" class="binput_box" name="quantity" value="1">
            <input type="submit" value="Remove" class="btnAddAction">
          </li>
        </form>
      </ul>
     </div>
   </div>
 <?php } }
    echo "<script>display('catlog');</script>";
   ?>
 </div>
