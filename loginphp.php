<?php
session_start();
$server = "localhost";
$uname = "client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
try{
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$sql = "SELECT UserID, password FROM users WHERE email = ?;";
$statement = $connection->prepare($sql);
$statement->execute([$email]);
$arr = $statement->fetch(PDO::FETCH_NUM);
if (password_verify($_REQUEST["password"], $arr[1])){
$_SESSION['ID'] = $arr[0];}
//echo $email . $password . $_SESSION['ID']. $arr[0] . $arr[1];
header("Location: index.php");
}
catch(Exception $e){echo "failed to connect to database";}
?>
