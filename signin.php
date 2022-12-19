<?php 
include 'header.php';

# check session
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
  echo 'You are already signed in.<br>';
  echo '<br><a href="game.php">Play game</a><br>';
  echo '<a href="signout.php">Sign out</a><br>';
} else { ?>
<div class="container">
  <main class="w-50 m-auto">
  <form method="post" action="signedin.php">
  <input type="hidden" name="activity" value="signin">
  <h1 class="display-6 my-3 fw-normal">Login</h1>
  <fieldset class="mt-3">
    <legend class="visually-hidden">
      Login Information
    </legend>
    <div class="form-floating">
      <input type="username" class="form-control" id="user" name="user_name" placeholder="Username" required>
      <label for="user">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="pass" name="user_pass" placeholder="Password" required>
      <label for="pass">Password</label>
    </div>
  </fieldset>
  <div class="text-center mt-3">
    <button class="w-50 btn btn-lg btn-primary" type="submit">Login</button>
  </div>
  </form>

  <div class="my-3">
    Don't have an account? <a class="link-secondary" href="register.php">Create an account</a>
  </div>
  
  </main>
</div>

  
<?php }

require 'footer.php';
?>