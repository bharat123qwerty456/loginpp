<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name']) ){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <marquee><h1>Welcome, <span><?php echo $_SESSION['user_name'] ?></span></h1></marquee>
      <p><?php echo $_SESSION['regno'] ?></p>
      <form>
        <label> <b>Select Subject to see your answer script : </b></label><br>
        <input type="radio" name="sub" value="19CS61C">OBJECT ORIENTED ANALYSIS AND DESIGN <br>
        <input type="radio" name="sub" value="19CS62C">PRINCIPLES OF COMPILER DESIGN <br>
        <input type="radio" name="sub" value="19CS63C">INTERNET AND WEB TECHNOLOGY <br>
        <input type="radio" name="sub" value="19CS64C">BUSINESS PROCESS MANAGEMENT<br>
        <input type="radio" name="sub" value="19CS31E">MOBILE APPLICATION DEVELOPMENT<br>
        <input type="radio" name="sub" value="19CS32E">UI/UX DESIGN<br>
        <input type="radio" name="sub" value="19CS34E">AUGMENTED REALITY AND VIRTUAL REALITY<br>
        <input type="radio" name="sub" value="19CS05E">BUSINESS ANALYTICS<br>
        <input type="radio" name="sub" value="19CS28E">CLOUD SECURITY<br>
        <input type="radio" name="sub" value="19CS15E">ARTIFICIAL INTELLIGENCE<br>
        <input type="radio" name="sub" value="19CS09E">BLOCKCHAIN ARCHITECTURE AND DESIGN<br>
        <input type="radio" name="sub" value="19ID01E">PRODUCT DESIGN AND DEVELOPMENT<br>
        <button type="button" onclick="submitForm()">SHOW PAPER</button>
  
    </form>
    <iframe id="resultIframe" src="" width="100%" height="500px" frameborder="0"></iframe>
    <script>
        function submitForm() {
            var radios = document.getElementsByName("sub");
            var selectedValue;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    selectedValue = radios[i].value;
                    break;
                }
            }
            var iframe = document.getElementById("resultIframe");
            iframe.src = `https://necexams.com/ScriptPDF/EXAMSCRIPTS/EXTERNALS/UG-A23/6-A23/${selectedValue}/131220.pdf#toolbar=0`;
        }
    </script>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>