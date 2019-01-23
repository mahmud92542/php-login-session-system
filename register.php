<?php include('connection.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
  session_start();
  if(isset($_SESSION['login_validity']))
  {
      
      header('Location: profile.php');
  }
  else{ ?>
  <div class="header">
    <h2>Register</h2>
  </div>
  
  <form method="post" action="connection.php">
    <div class="input-group">
      <label>User Name</label>
      <input type="text" name="username" placeholder="Enter your username" required>
    </div>
    <div class="input-group">
      <label>Full Name</label>
      <input type="text" name="name" placeholder="Enter your full name" required>
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-group">
      <label>Phone Number</label>
      <input type="text" name="mobile" placeholder="Enter your phone number" required>
    </div>
    <div class="input-group">
      <label>Blood Group</label>
      <input type="text" name="blood" placeholder="Enter your blood group" required>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1" placeholder="Set your password" required>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="signin.php">Sign in</a>
    </p>
  </form>
  <?php  } ?>
</body>
</html>
