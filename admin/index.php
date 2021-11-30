<?php  

include 'init.php';
include  $tpl . 'header.php';
include 'includes/languages/english.php';

// CHECK IF USER COMMING FROM HTTP POST REQUEST

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $hashpass = sha1($password);

    // CHECK IF USER EXISIT IN DATABASE

    $stmt = $con->prepare("SELECT Username, Password FROM users WHERE Username = ? AND Password = ? AND GroupID = 1");
    $stmt->execute(array($username,$hashpass));
    $count = $stmt->rowCount();

    // CHECK IF COUNT > 0 , THIS MEANS THAT THE DATABASE CONTAIN THIS USER
    if($count > 0) {
        echo "welcome " ." ". $username;
    }
} 

?>



<form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="login" method="POST">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="Usename" id="" autocomplete="FALSE">
    <input class="form-control" type="password" name="pass" placeholder="Password" id="" autocomplete="new-password">
    <input type="submit" value="Login" class="btn btn-primary btn-block">

</form>






<?php  include_once  $tpl . 'footer.php';?>