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
if ($_SESSION['ID'] == "") {
echo '<a href="login.php" class="Login">Login</a>';
}
else {
$sql = "SELECT name, accountType FROM users WHERE UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$name = $stmt->fetch();
if($name[0] != "" && $name[1] == "active") {
  echo '<a href="account.php" id="accountelem">'.$name[0].'</a>';
}
else {
  echo '<a href="renew.php" id="accountelem">Update Your Account</a>';
}
}
?>
