<?php
echo "Email this: ".password_hash($_REQUEST["password"], PASSWORD_DEFAULT)." to brendeg39@gmail.com or mcguire9@gmail.com from the address you want your username to be.";
/**
  //session_start();
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Pass";
try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
if (empty($_REQUEST["email"])) {}
else {
$email = $_REQUEST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  exit("invalid email");
}
$sql = "SELECT email FROM users WHERE email = ?;";
$statement = $connection->prepare($sql);
$statement->execute([$email]);
$norepeat = $statement->fetch(PDO::FETCH_NUM);
if (!empty($norepeat)) {
  echo "email already in use";
}
else {
  $name = $_REQUEST["name"];
  $email = $_REQUEST["email"];
  $password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (name, email, password) Values (?,?,?);";
  $statement = $connection->prepare($sql);
  $statement->execute([$name, $email, $password]);
  $sql = "SELECT ID FROM users WHERE email = ? AND password = ?;";
  $statement = $connection->prepare($sql);
  $statement->execute([$email, $password]);
  $arr = $statement->fetch(PDO::FETCH_NUM);
if(!$arr) exit('<a href="register.php">Register</a>');
  $_SESSION['ID'] = $arr[0];
  header("Location: other.php");
}}**/
  ?>
  <!DOCTYPE html>
<meta name="description" content="Register">
<html>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <style>
  .form {
    margin-left: auto;
    margin-right: auto;
    width: 30%;
  }
  </style>
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
</head>
<body>
  <div include="head.html"></div>
  <div class="form">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>Name: <input  name="name" required/></p>
  <p>Email:
    <input name = "email" required/></p>
  <p>Password:
    <input name = "password" minlength="8" type="password" required/></p>
  <input type="submit"/>
  </form>
</div>
</body>
</html>
