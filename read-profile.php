<?php
    require_once 'connection.php';    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT fullname,email,mobile,blood FROM users where username = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($login_session));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
?>

<div>
	<h1>Name: <?php echo $data['fullname'];?></h1>
	<h1>Email: <?php echo $data['email'];?></h1>
	<h1>Phone Number: <?php echo $data['mobile'];?></h1>
	<h1>Blood Group: <?php echo $data['blood'];?></h1>
</div>
