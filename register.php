<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- Bootstrap CSS link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   
   <!-- JavaScript for form validation -->
   <script>
      function validateForm() {
         var name = document.forms["registerForm"]["name"].value;
         var email = document.forms["registerForm"]["email"].value;
         var password = document.forms["registerForm"]["password"].value;
         var cpassword = document.forms["registerForm"]["cpassword"].value;

         // Reset error messages
         var errorMessages = document.querySelectorAll('.error-message');
         for (var i = 0; i < errorMessages.length; i++) {
            errorMessages[i].style.display = 'none';
         }

         // Check name
         if (name === "") {
            document.getElementById("name-error").style.display = 'block';
            return false;
         }

         // Check email format
         var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
         if (!email.match(emailPattern)) {
            document.getElementById("email-error").style.display = 'block';
            return false;
         }

         // Check password length
         if (password.length < 8) {
            document.getElementById("password-error").style.display = 'block';
            return false;
         }

         // Check password complexity
         var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/;
         if (!password.match(passwordPattern)) {
            document.getElementById("password-complexity-error").style.display = 'block';
            return false;
         }

         // Check confirm password
         if (cpassword !== password) {
            document.getElementById("cpassword-error").style.display = 'block';
            return false;
         }
      }
   </script>
</head>
<body>
   <div class="container mt-5">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <?php
            if(isset($message)){
               foreach($message as $msg){
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        '.$msg.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
               }
            }
            ?>

            <div class="card">
               <div class="card-header bg-primary ">
                  <h3 class="text-center" ><b>Register Now</b></h3>
               </div>
               <div class="card-body">
                  <form action="" method="post" name="registerForm" onsubmit="return validateForm()">
                     <div class="mb-3">
                        <input type="text" name="name" placeholder="Enter your name" required class="form-control form-control-lg" >
                        <div id="name-error" class="error-message" style="display: none;">Name is required.</div>
                     </div>
                     <div class="mb-3">
                        <input type="email" name="email" placeholder="Enter your email" required class="form-control form-control-lg">
                        <div id="email-error" class="error-message" style="display: none;">Invalid email format.</div>
                     </div>
                     <div class="mb-3">
                        <input type="password" name="password" placeholder="Enter your password" required class="form-control form-control-lg">
                        <div id="password-error" class="error-message" style="display: none;">Password should be at least 8 characters long.</div>
                        <div id="password-complexity-error" class="error-message" style="display: none;">Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.</div>
                     </div>
                     <div class="mb-3">
                        <input type="password" name="cpassword" placeholder="Confirm your password" required class="form-control" form-control-lg>
                        <div id="cpassword-error" class="error-message" style="display: none;">Confirm password does not match.</div>
                     </div>
                     <div class="mb-3">
                        <select name="user_type" class="form-select form-control-lg">
                           <option value="user">User</option>
                           <option value="admin">Admin</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <input type="submit" name="submit" value="Register Now" class="btn btn-primary">
                     </div>
                  </form>
                  <p>Already have an account? <a href="login.php">Login now</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap JS scripts -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
