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
    $sql = "DELETE FROM grower WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: other.php");
  }
  else {
  $sql = 'UPDATE grower SET FirstName = ?, MI = ?, LastName = ?, CompanyName = ?, MailingAddress = ?, City = ?, State = ?, Zip = ?, HomePhone = ?, MobilePhone = ?, Email = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
  header("Location: other.php");
}
}
?>
<html>
<head>
    <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="http://upgradeag.com/CIG/img/favicon.ico">
</head>
<body>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
<div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
session_start();
$sql = 'SELECT FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDGrower'], $_SESSION['ID']]);
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
</form></div><a href="otherfield.php">fields</a>';
?>
<script>
var txtBox = document.getElementsByTagName("input");
//alert(forms[0]); This is hhow you show a popup alert box
for (var i = 0; i < txtBox.length; i++) {
  txtBox[i].placeholder = txtBox[i].name.replace(/\B(?<![A-Z])[A-Z]/g, " $&");
}
</script>
</body>
</html>
