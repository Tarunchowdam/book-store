<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- Bootstrap CSS link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

   <?php include 'header.php'; ?>

   <div class="container mt-5">
      <div class="row">
         <div class="col-lg-12">
            <div class="heading">
               <h3>About Us</h3>
               <p><a href="home.php">Home</a> / About</p>
            </div>
         </div>
      </div>
   </div>

   <section class="about">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="flex">
                  <div class="image">
                     <img src="images/about-img.jpg" alt="">
                  </div>
                  <div class="content">
                     <h3>Why Choose Us?</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatibus aut hic molestias, reiciendis natus fuga, cumque excepturi veniam ratione iure. Excepturi fugiat placeat iusto facere id officia assumenda temporibus?</p>
                     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
                     <a href="contact.php" class="btn btn-primary">Contact Us</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="reviews">
      <div class="container">
         <h1 class="title text-center mb-5">Client's Reviews</h1>

         <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/pic-1.png" alt="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/pic-2.png" alt="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/pic-3.png" alt="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/pic-4.png" alt="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/pic-5.png" alt="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/pic-6.png" alt="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <!-- Repeat the above div for other reviews -->
         </div>
      </div>
   </section>

   <section class="authors">
      <div class="container">
         <h1 class="title text-center mb-5">Great Authors</h1>

         <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="box text-center">
                  <img src="images/author-1.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook-f"></a>
                     <a href="#" class="fab fa-twitter"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                  </div>
                  <h3>John Deo</h3>
               </div>
            </div>
            <!-- Repeat the above div for other authors -->
         </div>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <!-- Bootstrap JS scripts -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <!-- Custom JS file link -->
   <script src="js/script.js"></script>
</body>
</html>
