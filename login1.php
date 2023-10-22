<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link --> 
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

</style>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="form-container">
            <form action="" method="post" onsubmit="return validateForm()">
               <h3 class="mb-4">Login Now</h3>
               <div class="mb-3">
                  <input type="email" name="email" id="email" placeholder="Enter your email" required class="form-control" style="font-size: 18px;>
                  <span id="emailError" class="error"></span>
               </div>
               <div class="mb-3">
                  <input type="password" name="password" id="password" placeholder="Enter your password" required class="form-control" style="font-size: 18px;>
                  <span id="passwordError" class="error"></span>
               </div>
               <button type="submit" name="submit" class="btn btn-primary">Login Now</button>
               <p class="mt-3">Don't have an account? <a href="register.php">Register now</a></p>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
   function validateForm() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var emailError = document.getElementById("emailError");
      var passwordError = document.getElementById("passwordError");
      var isValid = true;

      emailError.textContent = "";
      passwordError.textContent = "";

      if (!email) {
         emailError.textContent = "Email is required.";
         isValid = false;
      }

      if (!password) {
         passwordError.textContent = "Password is required.";
         isValid = false;
      }

      return isValid;
   }
</script>

   <!--
   <div class="form-container">
   <form action="" method="post" onsubmit="return validateForm()">
      <h3>login now</h3>
      <input type="email" name="email" id="email" placeholder="enter your email" required class="box">
      <span id="emailError" class="error"></span>
      <input type="password" name="password" id="password" placeholder="enter your password" required class="box">
      <span id="passwordError" class="error"></span>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>
</div>

<script>
function validateForm() {
   const email = document.getElementById("email").value;
   const password = document.getElementById("password").value;
   const emailError = document.getElementById("emailError");
   const passwordError = document.getElementById("passwordError");

   // Reset error messages
   emailError.textContent = "";
   passwordError.textContent = "";

   // Email validation
   if (!validateEmail(email)) {
      emailError.textContent = "Please enter a valid email address.";
      return false;
   }

   // Password validation
   if (password.length < 8) {
      passwordError.textContent = "Password must be at least 8 characters long.";
      return false;
   }

   // Check password strength (e.g., should contain uppercase, lowercase, and a number)
   if (!validatePasswordStrength(password)) {
      passwordError.textContent = "Password should include uppercase, lowercase, and a number.";
      return false;
   }

   return true; // Allow form submission
}

function validateEmail(email) {
   var re = /\S+@\S+\.\S+/;
   return re.test(email);
}

function validatePasswordStrength(password) {
   var hasUpperCase = /[A-Z]/.test(password);
   var hasLowerCase = /[a-z]/.test(password);
   var hasNumber = /\d/.test(password);
   return hasUpperCase && hasLowerCase && hasNumber;
}
</script>
-->

</body>
</html>