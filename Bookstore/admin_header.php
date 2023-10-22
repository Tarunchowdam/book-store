







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

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo" style="font-family: 'Delius Swash Caps'">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>