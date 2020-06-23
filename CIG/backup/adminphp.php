<?php
session_start();
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Passterm";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){}
  $sql = 'UPDATE users SET mode = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['admin'], $_SESSION['ID']]);
  header("Location: other.php");
?>