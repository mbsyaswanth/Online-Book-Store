
<?php
// Start the session
session_start();
?>

    <?php
      include 'db_conn.php';
    ?>
    <?php

     $cat=htmlspecialchars($_GET["c"]);
     $bquery="SELECT * FROM `book` WHERE book_cat='$cat'";
     $bresult=mysqli_query($connect,$bquery);
    
    ?>
    <div class="bcontainer">
      <?php while ($row = mysqli_fetch_array($bresult)) { ?>
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
           <form method="post" action="cart.php?id=<?php echo $row['book_id']; ?>">
             <li>
               <input type="number" class="binput_box" name="quantity" value="1">
               <input type="submit" value="Add to cart" class="btnAddAction">
             </li>
           </form>
         </ul>
        </div>
      </div>
      <?php }
       echo "<script>display('catlog');</script>";
      ?>
    </div>
