<?php 
require 'header.php';
require 'php/conn.php';

//session_regenerate_id();
// sql to delete a record
$name = $_SESSION['username'];
$sql = "DELETE FROM users WHERE username='$name'";

if ($pdo->query($sql)) { ?>
  <p class="text-center mt-3">Account deleted</p>
  <ul class="list-group text-center list-unstyled">
    <li><a href="index.php">How to play</a></li>
    <li><a href="game.php">Play as guest</a></li>
    <li><a href="register.php">Create an account</a></li>
  </ul>
  
<?php } else {
  echo "Error deleting record: " . $pdo->error;
}


$_SESSION['signed_in'] = false;
$_SESSION['user_id'] = "";
$_SESSION['user_name'] = "";

session_destroy(); ?>


<?php require 'footer.php';
?>