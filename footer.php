         <!-- FOOTER -->
         <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <p class="text-muted">&copy; Dec. 2022, Kaitlyn Rice</p>
              </div>
              <div class="col-sm">
                <div class="row text-center border-bottom">
                  <?php if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
                    echo "<p class='text-muted'>Welcome " . $_SESSION['username'] . "</p>
                    </div>
                    <div class='row mt-3'>
                    <ul class='nav nav-justified link-dark text-decoration-none'>
                    <li class='nav-item ms-3'><a class='text-muted' href='game.php'>Play game</a></li>
                    <li class='nav-item ms-3'><a class='text-muted' href='signout.php'>Sign out</a></li>
                    </ul>
                    </div>";
                  } else { 
                    echo "<a href='game.php'><button type='button' class='btn btn-outline-secondary px-4 mb-3'>Play as Guest</button></a>
                    </div>
                    <div class='row mt-3'>
                    <ul class='nav nav-justified link-dark text-decoration-none'>
                    <li class='nav-item ms-3'><a class='text-muted' href='signin.php'>Sign In</a></li>
                    <li class='nav-item ms-3'><a class='text-muted' href='register.php'>Create an account</a></li>
                    </ul>
                    </div>";
                  } ?>
                  
               
              </div>
              <div class="col-sm">
                <ul class="nav justify-content-end">
                  <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                  <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                  <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
  </body>
</html>