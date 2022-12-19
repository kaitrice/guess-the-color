<?php 
// Create a PDO object to connect to your database for running select queries
$dsn = "mysql:host=localhost;dbname=guess_the_color";

/* Change */
$username = 'user';
$password = 'pass';

try {
  $pdo = new PDO($dsn, $username, $password);

} catch(PDOException $e) {
  die ("Connection failed: " . $e->getMessage() . " " . $e->getCode());
} 
?>
