<?php
  include 'db_conn.php';
?>

<?php
// Start the session
session_start();
?>

<?php
    if(isset($_POST['Lsubmit'])){
      $login=$_POST['loginid'];
      $password=$_POST['key'];
      $query="SELECT * FROM `login` WHERE usr_email='$login' AND usr_password='$password'";
      $result=mysqli_query($connect,$query);
      $count=mysqli_num_rows($result);
      if($count==1){
        echo "<script>alert('Login success');</script>";
        $_SESSION['user']=$login;
        echo "<script>
    setTimeout(function(){
       window.location.href = 'index.php';
    }, 50);
</script>";
      }
      else {
        echo "<script>alert('Login Fail, verify account details');</script>";
        echo "<script>
    setTimeout(function(){
       window.location.href = 'index.php';
    }, 50);
</script>";
      }
    }
 ?>
