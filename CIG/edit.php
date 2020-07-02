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
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
  if (isset($_POST['FirstName'])) {
  if ($_POST['delete'] == "on") {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
    $sql = "DELETE FROM grower WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDGrower']]);
    $_POST['delete'] == "off";
    header("Location: other.php");}
  else {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
    $sql = "DELETE FROM field WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: otherfield.php");}}}
  else {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'UPDATE grower SET FirstName = ?, MI = ?, LastName = ?, CompanyName = ?, MailingAddress = ?, City = ?, State = ?, Zip = ?, HomePhone = ?, MobilePhone = ?, Email = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_COOKIE['PrimeIDGrower']]);
  header("Location: other.php");}
  else {
  $sql = 'UPDATE grower SET FirstName = ?, MI = ?, LastName = ?, CompanyName = ?, MailingAddress = ?, City = ?, State = ?, Zip = ?, HomePhone = ?, MobilePhone = ?, Email = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
  header("Location: other.php");
  }
}
}
?>
<html>
<head>
    <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
</head>
<body>
  <nav class="sidenav">
  <a class="sidenavmain" style = "margin-top: 10px;" href="other.php">Grower</a>
    <div class="indented"><a onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'edit.php';}">Edit Grower</a><br />
  </div>
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a>
  <img src="https://upgradeag.com/CIG/img/LogoNutrientStar.jpg" />
  <img src="https://upgradeag.com/CIG/img/logoamplify.jpg" />
</nav><br /><div class="main">
<div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
session_start();
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
$sql = 'SELECT FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDGrower']]);}
else {
$sql = 'SELECT FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
}
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '<input type="text" value="'.$arr[0].'" name="FirstName"></input>
<input type="text" value="'.$arr[1].'" name="MI"></input>
<input type="text" value="'.$arr[2].'" name="LastName"></input>
<input type="text" value="'.$arr[3].'" name="CompanyName"></input>
<input type="text" value="'.$arr[4].'" name="MailAdd"></input>
<input type="text" value="'.$arr[5].'" name="City"></input>
<input type="text" value="'.$arr[6].'" name="State"></input>
<input type="number" value="'.$arr[7].'" name="ZIP"></input>
<input type="phone" value="'.$arr[8].'" name="Home"></input>
<input type="phone" value="'.$arr[9].'" name="Mobile"></input>
<input type="email" value="'.$arr[10].'" name="Email"></input>
<input type="submit"></input><input type="checkbox" name="delete">Delete</input>
</form></div></div>';
?>
<script>
var txtBox = document.getElementsByTagName("input");
//alert(forms[0]); This is how you show a popup alert box
for (var i = 0; i < txtBox.length; i++) {
  txtBox[i].placeholder = txtBox[i].name.replace(/\B(?<![A-Z])[A-Z]/g, " $&");
}
</script>
</body>
</html>
