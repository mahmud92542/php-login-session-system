<?php
   session_start();
   if(isset($_SESSION['login_user']))
      $login_session = $_SESSION['login_user'];
   else
      $login_session = "You're not logged in.";
?>
<html>
   
   <head>
      <title>Welcome</title>
   </head>
   
   <body>

      <h1>Welcome! <?php echo $login_session; ?></h1>
      <?php 
      if (isset($_SESSION['login_user']))
      {?>
         <?php include ("read-profile.php"); ?>
         
         <h2><a href = "logout.php">Sign Out</a></h2>
      <?php }
      else
      { ?>
         <h2><a href = "signin.php">Sign in</a></h2>
      <?php } ?>
   </body>
   
</html>

