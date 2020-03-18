<html>
<title>Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<h1><a href="index.php" class="head">Simplified Technology Services Inc.</a></h1>
<div class="nav">
  <a href="operators.php">Operators</a>
  <a href="farms.php">Farms</a>
  <a href="fields.php">Fields</a>
  <a href="prices.php">Prices</a>
  <a href="crop.php">Crop</a>
  <a href="applicants.php">Applications</a>
  <a href="chemicalsForm.php">Chemicals</a>
  <a href="#Feritalizers">Feritalizers</a>
  <a href="forms.php">Forms</a>
  <?php
  session_start();
  if($_SESSION['ID'] < 1) {header('Location: login.php');}
  $server = "localhost";
  $uname = "client";
  $pword = "Pass";
try {
  $connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
if ($_SESSION['ID'] == null) {
  echo '<a href="login.php" class="Login">Login</a>';
}
else {
$sql = "SELECT name FROM users WHERE UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$name = $stmt->fetch();
echo '<a class="activeNav" href="account.php">'.$name[0].'</a>';
}
  ?>
  </div>
<h2>Need Help?</h2>
<h3>Phone: <a href="tel:419-212-0479">(419) 212-0479</a></h3>
<h3>Email: <a href="mailto:mcguire9@gmail.com"> mcguire9@gmail.com</a></h3>
</body>
</HTML>
