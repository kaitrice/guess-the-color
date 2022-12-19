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
  <input type="hidden" name="activity" value="register">
  <h1 class="display-6 my-3 fw-normal">Create an account</h1>
  <fieldset>
        <legend>
          Your Information
        </legend>
        <div class="form-floating">
          <input type="text" class="form-control" id="f_name" name="f_name" placeholder="John" required>
          <label for="f_name">First Name</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Doe" required>
          <label for="l_name">Last Name</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="user@domain.com" required>
          <label for="email">Email</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="location" name="location" placeholder="Somewhere">
          <label for="location">Location</label>
        </div>
        </fieldset>
  <fieldset class="mt-3">
    <legend>
      Account Information
    </legend>
    <!-- USERNAME -->
    <div class="form-floating">
      <input type="username" class="form-control" id="user" name="user_name" placeholder="Username" required>
      <label for="user">Username</label>
    </div>
    <!-- PASSWORD -->
    <div class="form-floating">
      <input type="password" class="form-control" id="pass" name="user_pass" placeholder="Password" required>
      <label for="pass">Password</label>
    </div>
    <!-- PASSWORD VERIFICATION -->
    <div class="form-floating">
      <input type="password" class="form-control" id="pass_var" name="user_pass_var" placeholder="Password" required>
      <label for="pass_var">Password</label>
    </div>
  </fieldset>
  <div class="text-center mt-3">
    <button class="w-50 btn btn-lg btn-primary" type="submit">Create Account</button>
  </div>
  </form>

  

  <div class="my-3">
    Already have an account? <a class="link-secondary" href="signin.php">Sign In</a>
  </div>
  <div>
    <p class="mt-3">
      <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Requirements
      </a>
    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        <ol class="list-group">
          <li class="list-group-item">First name <span class="text-danger">must</span> be present</li>
          <li class="list-group-item">Last name <span class="text-danger">must</span> be present</li>
          <li class="list-group-item">Email <span class="text-danger">must</span> be avalid email</li>
          <li class="list-group-item">Location no requirements</li>
          <li class="list-group-item">Username <span class="text-danger">must</span> be at least 3 characters long</li>
          <li class="list-group-item">Password <span class="text-danger">must</span> be between 4 and 10 characters, contain a number, and not contain any '()', '[]', '.', or '{}'.</li>
          <li class="list-group-item">Password verification <span class="text-danger">must</span> match password</li>
        </ol>
      </div>
    </div>
    
  </div>
  
  </main>
</div>

  
<?php }

require 'footer.php';
?>