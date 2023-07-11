<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM login WHERE reg = '$email' && pass = '$pass' ";
   $sel="SELECT * FROM list WHERE reg='$email'";
   $result = mysqli_query($conn, $select);
   $res=mysqli_query($conn,$sel);
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $rrow=mysqli_fetch_array($res);

         $_SESSION['user_name'] = $rrow['name'];
         $_SESSION['regno']=$row['reg'];
         header('location:user_page.php');
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="email" required placeholder="Reg No">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">Create now</a></p>
   </form>

</div>

</body>
</html>