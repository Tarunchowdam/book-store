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
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
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
   
  

<div class="container mt-5">
   <div class="form-container">
      <form action="" method="post" onsubmit="return validateForm()" class="needs-validation" novalidate>
         <h3>Register Now</h3>
         <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Enter your name" required class="box form-control">
            <div class="invalid-feedback">Please enter your name.</div>
         </div>
         
         <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Enter your email" required class="box form-control">
            <div class="invalid-feedback">Please enter a valid email address.</div>
         </div>
         
         <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Enter your password" required class="box form-control">
            <div class="invalid-feedback">Please enter a password.</div>
         </div>
         
         <div class="form-group">
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required class="box form-control">
            <div class="invalid-feedback">Please confirm your password.</div>
         </div>
         
         <div class="form-group">
            <select name="user_type" id="user_type" class="box form-control">
               <option value="user">user</option>
               <option value="admin">admin</option>
            </select>
         </div>
         
         <button type="submit" name="submit" class="btn btn-primary mt-3">Register Now</button>
         <p>Already have an account? <a href="login.php">Login now</a></p>
      </form>
   </div>
</div>

<script>
function validateForm() {
   const name = document.getElementById("name").value;
   const email = document.getElementById("email").value;
   const password = document.getElementById("password").value;
   const cpassword = document.getElementById("cpassword").value;

   const form = document.querySelector('.needs-validation');
   
   if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      form.classList.add('was-validated');
      return false;
   }
   
   if (password !== cpassword) {
      showError('cpassword', "Passwords do not match.");
      return false;
   }

   return true; // Allow form submission
}

function showError(fieldId, message) {
   var field = document.getElementById(fieldId);
   var feedback = field.nextElementSibling;
   
   field.classList.add('is-invalid');
   feedback.textContent = message;
   feedback.style.display = 'block';
}
</script>

</body>
</html>


<!--<script>
function validateForm() {
   const name = document.getElementById("name").value;
   const email = document.getElementById("email").value;
   const password = document.getElementById("password").value;
   const cpassword = document.getElementById("cpassword").value;
   const nameError = document.getElementById("nameError");
   const emailError = document.getElementById("emailError");
   const passwordError = document.getElementById("passwordError");
   const cpasswordError = document.getElementById("cpasswordError");

   // Reset error messages
   nameError.textContent = "";
   emailError.textContent = "";
   passwordError.textContent = "";
   cpasswordError.textContent = "";

   // Name validation
   if (name.trim() === "") {
      nameError.textContent = "Please enter your name.";
      return false;
   }

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

   // Check password strength
   if (!validatePasswordStrength(password)) {
      passwordError.textContent = "Password should include uppercase, lowercase, and a number.";
      return false;
   }

   // Confirm password
   if (password !== cpassword) {
      cpasswordError.textContent = "Passwords do not match.";
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