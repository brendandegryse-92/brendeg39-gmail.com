<?php
session_start();
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){}
var_dump($_POST['admin']);
if ($_POST['admin']=="On") {
    $sql = 'UPDATE users SET AccountType = "Admin" WHERE ID = ? AND mode = 1';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  header("Location: other.php");
  }
if ($_POST['admin']=="Off") {$sql = 'UPDATE users SET AccountType = "" WHERE ID = ? AND mode = 1';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  header("Location: other.php");
  }
?>