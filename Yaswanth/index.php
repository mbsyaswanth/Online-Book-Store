<?php
// Start the session
session_start();
?>
<?php
   $a=isset($_SESSION['user']);
 ?>
<!DOCTYPE html>
<html>
 <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylenav.css">
	<title>Online book store</title>
	<link rel="icon" href="favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>


    function display(a) {
      var b=["home","login","register","catlog"];
      for (var i = 0; i < b.length; i++) {
        document.getElementById(b[i]).style.display="none";
      }
      document.getElementById(a).style.display="block";

    };

	</script>
  <script>
   function loadDoc() {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         document.getElementById("login").innerHTML =this.responseText;
       }
     };
     xhttp.open("GET", "account.php", true);
     xhttp.send();
   }
   if(<?php echo "$a"; ?>){
     loadDoc();
   }
 </script>
 </head>
 <body>
 <?php
   include 'db_conn.php';
 ?>
 <?php
   $user_status=(isset($_SESSION['user'])?"Logout":"Login");
 ?>
 <nav>
   <div class="heading">Online book Store </div>
   <div class="logo" > <img src="favicon.ico" width="50px"></div>
   <ul class="responsive">
      <li> <a onclick="display('home')">Home</a> </li>
      <li> <a onclick="display('login')"><?php echo "$user_status"; ?></a> </li>
      <li> <a onclick="display('register')">Register</a> </li>
      <li class="dropdown_parent"> <a onclick="display('catlog')">Catlog</a>
        <div class="dropdown">
          <ul>
            <li onmouseup="display('catlog')"> <a href="?c=cse">CSE</a>  </li>
            <li onclick="display('catlog')"> <a href="?c=ece">ECE</a>  </li>
            <li onclick="display('catlog')"> <a href="?c=mech">MECH</a> </li>
          </ul>
        </div>
      </li>
      <li> <a href="">Cart</a> </li>
      <div class="nav-btn">
         <label>
            <span></span>
            <span></span>
            <span></span>
         </label>
      </div>
   </ul>
 </nav>
 <section>

 <div id="login">
   <form class="forms" method="post" action="login_check.php">
   <div class="fo">

     <label>Login Id:<input type="email" name="loginid" placeholder="enter email"></label>

     <label>Password:<input type="password" name="key"></label>

     <div class="form_butons"><label><input type="reset" name="reset" ></label><label><input type="submit" name="Lsubmit" ></label></div>

  </div>
   </form>
 </div>
 <div id="home">
   <p>This will be homepage soon</p>
 </div>
 <div id="register">
    <?php
      if(isset($_POST['Rsubmit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $check="SELECT * FROM `login` WHERE usr_email='$email'";
        $verify=mysqli_query($connect,$check);
        $rows = mysqli_num_rows($verify);
        if ($rows>0) {
          echo "<script>alert('Account already exist');</script>";
        }
        else{
          $registerQ=
          "INSERT INTO `login`(`usr_name`, `usr_email`, `usr_password`, `usr_phone`) VALUES ('$name','$email','$password','$phone')";
          $Rquery=mysqli_query($connect,$registerQ);
          if($Rquery){
            echo "<script>alert('user Created');</script>";
          }
          else{
            echo "<script>alert('error creating user');</script>";
            echo "error in query".mysqli_error($connect);
          }
        }
      }
     ?>
     <form class="forms" method="post" action="index.php">
         <div class="fo">

           <label>Name:<input type="text" name="name"></label>

           <label>Email:<input type="email" name="email"></label>

           <label>Password:<input type="password" name="password"></label>

           <label>Retype:<input type="password" name="rpassword" placeholder="retype password"></label>

           <label>Phone:<input type="number" name="phone"></label>

           <div class="form_butons"><label><input type="reset" name="reset" ></label><label><input type="submit" name="Rsubmit" ></label></div>

        </div>
     </form>
 </div>
 <div id="catlog">
   <p>We are building this page</p>
   <?php include 'book_box.php'; ?>
 </div>
</section>
 </body>

</html>
