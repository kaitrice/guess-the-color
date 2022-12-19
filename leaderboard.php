<?php 
session_start();
require 'php/conn.php';

$query = "SELECT u.username, u.f_name, u.l_name, u.location, s1.Score, (SELECT count( DISTINCT Score) FROM Scores s2 WHERE s2.Score >= s1.Score)as 'Rank' FROM Scores s1 JOIN Users u ON s1.user_id = u.user_id ORDER BY s1.Score DESC;";
$rows = $pdo->query($query);

require 'header.php'; ?>

<section class="main-content">
  <div class="container">
    
  <div class="my-5">
    <h1>High Scores</h1>
    <div class="row">
      
      <!-- USER -->
      <?php 
      
      
      
      
      for ($i=0; $i<3; $i++) { 
        $user = $rows->fetch(PDO::FETCH_ASSOC);?>
      
        <div class="col-sm-4">
					<div class="leaderboard mt-3">
						<div class="leaderboard-top">
							<h3 class="text-center"> <?php echo $user['Score'] ?></h3>
						</div>
						<div class="leaderboard-body">
							<div class="text-center">
								<h5 class="mb-0"><?php echo $user['f_name'] . ' ' . $user['l_name']?></h5>
								<p class="text-muted mb-0"><?php echo $user['username']?></p>
                <span><i class="text-center"></i><?php echo $user['location']?></span>
								<hr>
							</div>
						</div>
					</div>
				</div>
      <?php } ?>
        
    </div>
  </div>

  <div class="my-5">
    <h4>Other scores</h4>
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Rank</th>
          <th>User</th>
          <th>Location</th>
          <th>High Score</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        while ($user = $rows->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
          <td><?php echo $user['Rank']?></td>

            <td>
              <div class="d-flex align-items-center">
                <div class="">
                  <h5 class="mb-0"><?php echo $user['f_name'] . ' ' . $user['l_name']?></h5>
                  <p class="text-muted mb-0"><?php echo $user['username']?></p>
                </div>
              </div>
            </td>

            <td>Bellingham</td>

            <td>
              <div class="d-flex align-items-center">
                <h4 class="text-center"><?php echo $user['Score'] ?></h4>
              </div>
            </td>
          </tr>
        <?php 
        }?>
      </tbody>
    </table>
  </div>
</div>
</section>

<?php require 'footer.php';
?>