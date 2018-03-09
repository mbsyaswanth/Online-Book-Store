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
        console.log("i am here, right inside the loop");
        document.getElementById(b[i]).style.display="none";
      }
      console.log("you clicked home");
      document.getElementById(a).style.display="block";

    };

	</script>
 </head>
 <body>
 <header>
 <h1 align="center">Online book Store </h1>
</header>
<?php
//Code to connect database
 $connect=mysqli_connect("localhost","root","","bookstore");
  if(!$connect)
 $status= "error connecting to database..".mysqli_connect_error();
 else {
 $status= "Connected successfully";
 }
  echo $status; // to Know whether connected or -
 ?>            //-if there is some error
 <nav>

     <a onclick="display('home')">Home</a>
     <a onclick="display('login')">Login</a>
     <a onclick="display('register')">Register</a>
     <a onclick="display('catlog')">Catlog</a>
     <a href="">Add to cart</a>

 </nav>
 <section>

 <div id="login">
   <?php
       if(isset($_POST['Lsubmit'])){
         $login=$_POST['loginid'];
         $password=$_POST['key'];
         $query="SELECT * FROM `login` WHERE email='$login' AND password='$password'";
         $result=mysqli_query($connect,$query);
         $count=mysqli_num_rows($result);
         if($count==1){
           echo "<script>alert('Login success');</script>";
         }
         else {
           echo "<script>alert('Login Fail, verify account details');</script>";
         }
       }
    ?>
   <form class="forms" method="post" action="index.php">
   <div class="fo">

     <label>Login Id:<input type="text" name="loginid"></label>

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
        $check="SELECT * FROM `login` WHERE email='$email'";
        $verify=mysqli_query($connect,$check);
        $rows = mysqli_num_rows($verify);
        if ($rows>0) {
          echo "<script>alert('Account already exist');</script>";
        }
        else{
          $registerQ=
          "INSERT INTO `login`(`NAME`, `EMAIL`, `PASSWORD`, `PHONE`) VALUES ('$name','$email','$password','$phone')";
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
   <style>
   .catlogtable {
   	border-collapse: collapse;
       width: 100%;
   }
    .catlogtable th, .catlogtable td {
   	border: 1px solid #ddd;
       padding: 8px;
   }
   </style>
   <table class="catlogtable">
     <tr>
       <th>Book Cover</th><th>Book Name</th><th>Author</th><th>Price</th>
     </tr>
     <tr align="center">
       <td colspan="4"><a href="">Add to cart</a></td>
     </tr>
   </table>
 </div>
</section>
 </body>

</html>
