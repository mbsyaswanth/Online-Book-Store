
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="book_box_style.css">
    <title>Catlog Page</title>
  </head>
  <body>
    <?php
      include 'db_conn.php';
    ?>
    <?php

     // count number of cart cartItems
     $a=isset($_SESSION['user']);
     if($a){
        $user=$_SESSION['user'];
        $query="SELECT * FROM `cart` WHERE usr_email='$user'";
        $boo_id=mysqli_query($connect,$query);
        $count=mysqli_num_rows($boo_id);
        $_SESSION["cartItems"]=$count;

     }
     $cat=htmlspecialchars($_GET["c"]);
     if ($cat==="cart") {
        $a=isset($_SESSION['user']);
        if($a){
           $user=$_SESSION['user'];
           $uery="SELECT * FROM `cart` WHERE usr_email='$user'";
           $boo_id=mysqli_query($connect,$uery);
           $count=mysqli_num_rows($boo_id);
           $_SESSION["cartItems"]=$count;

        }else{
          echo "<script>alert('Please login first');</script>";
          echo "<script>window.location.href = 'index.php';</script>";
        }
     } else{
     $bquery="SELECT * FROM `book` WHERE book_cat='$cat'";
     $bresult=mysqli_query($connect,$bquery);
    }
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
  </body>
</html>
