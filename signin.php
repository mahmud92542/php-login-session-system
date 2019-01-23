<!DOCTYPE html>
<html>
<head>
  <title>Registration System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
  include('connection.php');
  session_start();
  if(isset($_SESSION['login_validity']))
  {
      
      header('Location: profile.php');
  }
  else{ ?>
  <div class="header">
    <h2>Signin</h2>
  </div>
   
  <form method="post" action="connection.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" placeholder="Enter your username">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" placeholder="Enter your password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
  <?php  } ?>
</body>
</html>
