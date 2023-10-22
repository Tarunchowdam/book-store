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
   <title>Login</title>

   <!-- Bootstrap CSS link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <!-- JavaScript for form validation -->
   <script>
      function validateForm() {
         var email = document.forms["loginForm"]["email"].value;
         var password = document.forms["loginForm"]["password"].value;

         if (email === "" || password === "") {
            alert("Both email and password are required.");
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
            <div class="card-header bg-primary">
               <h3 class="text-center">Login Now</h3>
            </div>
            <div class="card-body">
               <form action="" method="post" name="loginForm" onsubmit="return validateForm()">
                  <div class="mb-3">
                     <input type="email" name="email" placeholder="Enter your email" required class="form-control form-control-lg" >
                  </div>
                  <div class="mb-3">
                     <input type="password" name="password" placeholder="Enter your password" required class="form-control  form-control-lg " >
                  </div>
                  <div class="mb-3">
                     <input type="submit" name="submit" value="Login Now" class="btn btn-primary">
                  </div>
               </form>
               <p>Don't have an account? <a href="register.php">Register now</a></p>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Bootstrap JS scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
