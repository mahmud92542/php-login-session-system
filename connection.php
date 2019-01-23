<?php
class Database
{
    private static $dbName = 'account' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = ($_POST['username']);
  $name = ($_POST['name']);
  $email = ($_POST['email']);
  $mobile = ($_POST['mobile']);
  $blood = ($_POST['blood']);
  $password_1 = ($_POST['password_1']);
  
  $sql = "INSERT INTO users (username, fullname, email, mobile, blood, password)
  VALUES ('$username','$name', '$email', '$mobile', '$blood', '$password_1')";
  $q = $pdo->prepare($sql);
  $q->execute(array($username,$name,$email,$mobile,$blood,$password_1));
  header('Location: signin.php');
}

else if (isset($_POST['login_user'])) {
  // collect data from server
  $myusername = ($_REQUEST['username']);
  $mypassword = ($_REQUEST['password']);


  $sql = "SELECT username FROM users WHERE username = '$myusername' and password = '$mypassword'";
  $result = $pdo->prepare($sql);
  $row = $result->fetch(MYSQLI_ASSOC);
  
  $count = ($result);
  
// If result matched $myusername and $mypassword, table row must be 1 row
    
  if($count == 1) {
    session_start();
     $_SESSION['login_user'] = $myusername;
     $_SESSION['login_validity'] = 1;
    //echo $_SESSION['login_user'];
    header('Location: profile.php');
  }else {
     echo "Please, check your info again. <br>";
  }

}

?>