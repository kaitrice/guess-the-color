<?php 
require 'header.php';

//session_regenerate_id();
$_SESSION['signed_in'] = false;
$_SESSION['user_id'] = "";
$_SESSION['user_name'] = "";

session_destroy(); ?>

<p class="text-center mt-3">You have signed out.</p>
<ul class="list-group text-center list-unstyled">
  <li><a href="index.php">How to play</a></li>
  <li><a href="signin.php">Sign in</a></li>
  <li><a class='link-danger' href="deleteAccount.php">Delete account</a></li>
</ul>


<?php require 'footer.php';
?>