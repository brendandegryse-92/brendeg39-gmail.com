<html>
<title>inventory</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <style>
html {
  margin: 0;
  padding: 0;
}
body {
margin: 0;
width: 100%;
padding: 0;
}
h1 {
  background-image: linear-gradient(blue, #33ccff);
  padding-top: 1%;
  padding-bottom: 1%;
  margin: 0;
  position: relative;
  top: 0;
  width: 100%;
}
table {
  border: 2px;
  border-color: #42bff5;
  width: 100%;
}
td {
  border: 2px;
  border-radius: 20px;
  background-color: #42bff5;
  font-size: 80%;
  width: 8%;
  text-align: center;
}
.head {
text-decoration: none;
color: black;
}
.button {
  background-color: white;
  float: left;
}
.links {
  background-color: lightgreen;
  border-radius: 25px;
  color: black;
  text-decoration: none;
}
.img {
    background-color: white;
}
input {
  border-radius: 20px;
  background-color: #42bff5;
  font-size: 80%;
  width: 100%;
  height: 100%;
}
img {
  background-color: white;
  height: 10%;
  width: 10%;
}
.nav {
  overflow: hidden;
  background-color: orange;
  position: sticky;
  margin-top: 0px;
  top: 0;
  width: 100%;
  text-align: center;
}
.checkbox {
  height:auto;
}
.Login {
  float: right;
}
.nav a {
  float: left;
  color: #f2f2f2;
  overflow: hidden;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 16px;
}
.nav a:hover {
  background-color: blue;
}
</style>
</head>
<body>
<h1><a href="index.php" class="head">Simplified Technology Services Inc.</a></h1>
<div class="nav">
  <a href="operators.php">Operators</a>
  <a href="farms.php">Farms</a>
  <a href="fields.php">Fields</a>
  <a href="#Applicants">Applicants</a>
  <a href="#Chemicals">Chemicals</a>
  <a href="#Feritalizers">Feritalizers</a>
  <a href="#Seeds">Seeds</a>
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
echo '<a href="account.php">'.$name[0].'</a>';
}
  ?>
  </div>
  <div>
    <a href="seeds.php" class="links">Seeds</a>
    <a href="#fertalizers.php" class="links">fertalizers</a>
    <a href="#chemicals.php" class="links">chemicals</a>
  </div>
  </body>
  </html>
