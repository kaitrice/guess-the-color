<?php 
function FILTER_VALIDATE_PASSWORD($pw) {
  if (preg_match('/^(?=.*\d)[0-9A-Za-z]{4,10}$/', $pw) && !str_contains($pw, "(") && !str_contains($pw, ")") && !str_contains($pw, "[") && !str_contains($pw, "]") && !str_contains($pw, "{") && !str_contains($pw, "}") && !str_contains($pw, ".")) {
    return true;
  }
  return false;
}

session_start();

require 'php/conn.php';

include 'header.php';
?>


    <?php
    
    # SIGNED IN
    if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) { ?>

      <p class="text-center mt-3">You are already signed in.</p>
      <ul class="list-group text-center list-unstyled">
        <li><a href="index.php">How to play</a></li>
        <li><a href="game.php">Play game</a></li>
        <li><a href="signout.php">Sign out</a></li>
        <li><a class='link-danger' href="deleteAccount.php">Delete account</a></li>
      </ul>
    <?php } else {
      $activity = "";
      $first = "";
      $last = "";
      $email = "";
      $location = "";
      $name = "";
      $pass = "";
      $pass_var = "";
      if (isset($_REQUEST['activity'])) {
        $activity = $_REQUEST['activity'];
      }
      # SIGN IN
      if ($activity == 'signin') {
        if (isset($_REQUEST['user_name'])) {
          $name = $_REQUEST['user_name'];
        }

        if (isset($_REQUEST['user_pass'])) {
          $pass = $_REQUEST['user_pass'];
        }

        $query = "SELECT * FROM users" .
          " WHERE username = '$name';";

        $rows = $pdo->query($query);

        if ($rows == null) {
          echo 'Something went wrong while signing in. Please try again.';
        } else {
          $rowAry = $rows->fetch(PDO::FETCH_ASSOC);
          if (is_array($rowAry)) {
            $pass_var = $rowAry['password'];
          }

          //if ($pass != $rowAry['user_pass]) <-- wrong, password in DB is hashed
          if (!(password_verify($pass, $pass_var)) || (count($rowAry) == 0) || ($rowAry == null)) { ?>

            <p class="text-center mt-3">You have supplied a wrong user/password combination. Please try again.</p>
            <ul class="list-group text-center list-unstyled">
              <li><a href="index.php">How to play</a></li>
              <li><a href="signin.php">Sign in</a></li>
            </ul>
          <?php } else {
            //session_regenerate_id();
            $_SESSION['signed_in'] = true;
            $_SESSION['user_id'] = $rowAry['user_id'];
            $_SESSION['username'] = $rowAry['username']; ?>

            <p class="display-6 text-center mt-3"><?php echo 'Welcome, ' . $_SESSION['username'] ?>!</p>
            <ul class="list-group text-center list-unstyled">
              <li><a href="index.php">How to play</a></li>
              <li><a href="game.php">Play game</a></li>
              <li><a href="signout.php">Sign out</a></li>
              <li><a class='link-danger' href="deleteAccount.php">Delete account</a></li>
            </ul>
          <?php
          }
        }
      }

      # REGISTER
      if ($activity == 'register') {
        if (isset($_REQUEST['f_name'])) {
          $first = $_REQUEST['f_name'];
        }

        if (isset($_REQUEST['l_name'])) {
          $last = $_REQUEST['l_name'];
        }

        if (isset($_REQUEST['email'])) {
          $email = $_REQUEST['email'];
        }

        if (isset($_REQUEST['location'])) {
          $location = $_REQUEST['location'];
        }

        if (isset($_REQUEST['user_name'])) {
          $name = $_REQUEST['user_name'];
        }

        if (isset($_REQUEST['user_pass'])) {
          $pass = $_REQUEST['user_pass'];
        }

        if (isset($_REQUEST['user_pass_var'])) {
          $pass_var = $_REQUEST['user_pass_var'];
        }

        $pw = password_hash($pass, PASSWORD_DEFAULT);

        #if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($name) < 3 || $pass != $pass_var || !FILTER_VALIDATE_PASSWORD($pw)) {
          #echo 'Trouble creating account.<br>';
          #echo '<br><a href="game.php">Play as guest</a><br>';
          #echo '<a href="register.php">Try Again</a><br>';
        #} else {
          $query = "SELECT username FROM users WHERE username = '$name';";

          $rows = $pdo->query($query);
          if ($rows > 0) { ?>
            <p>Username taken.</p>
            <a href="game.php">Play as guest</a>
            <a href="register.php">Try Again</a>
          <?php } else {
            $query = "INSERT INTO `users` (`f_name`, `l_name`, `email`, `location`, `username`, `password`) VALUES ('$first', '$last', '$email', '$location', '$name', '$pw');";
            $result = $pdo->query($query);

            $query = "SELECT * FROM `users` WHERE username='ricek20';";
            $result = $pdo->query($query);

            if ($result) { ?> 
              <p class="text-center">Successful.</p>
              <ul class="list-group text-center list-unstyled">
                <li><a href="index.php">How to play</a></li>
                <li><a class="text-center" href="game.php">Play as guest</a></li>
              </ul>≈
            <?php }
          }
        }
      }
    include 'footer.php';
    ?>