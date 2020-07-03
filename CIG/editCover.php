</html>
ssion_start();
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
  if (isset($_POST['CoverCrop'])) {
  if ($_POST['delete'] == "on") {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
    $sql = "DELETE FROM covercrop WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDCover']]);
    $_POST['delete'] == "off";
    header("Location: covercrop.php");}
  else {
    $sql = "DELETE FROM covercrop WHERE ID = ? And UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDCover'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: covercrop.php");
  }
  }
  else {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'UPDATE covercrop SET CoverCrop = ?, DateSeeded = ?, How = ?, Ncredits = ?, HowKilled = ?, DateKilled = ?, Notes = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['How'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Notes'], $_COOKIE['PrimeIDCover']]);
  header("Location: othercovercrop.php");}
  else {
  $sql = 'UPDATE covercrop SET CoverCrop = ?, DateSeeded = ?, How = ?, Ncredits = ?, HowKilled = ?, DateKilled = ?, Notes = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['How'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Notes'], $_COOKIE['PrimeIDCover'], $_SESSION['ID']]);
  header("Location: othercovercrop.php");}
  }
}
?>
<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
</head>
<body><h1><?php
session_start();
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
$sql = 'SELECT FieldName FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
echo $arr[0][0];
?></h1>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a><div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
session_start();
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
$sql = 'SELECT * FROM covercrop WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDCover']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);}
  else {
$sql = 'SELECT * FROM covercrop WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDCover'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);}
echo '
  Cover Crop:<input type="text" value="'.$arr[3].'" name="CoverCrop"></input>
  Date Seeded:<input type="date" value="'.$arr[4].'" name="DateSeeded"></input>
  How Was It Seeded:<input type="text" value="'.$arr[5].'" name="HowSeeded"></input>
  Ncredits:<input type="number" value="'.$arr[6].'" name="Ncredits"></input><br />
  How Was It Killed:<input type="radio" name="HowKilled" id="How1" value="0"'; if ($arr[7] == 0) {echo ' checked';} echo '><label for="How1">Chemical burn down</label></input><input type="radio" name="HowKilled" id="How2" value="1"'; if ($arr[7] == 1) {echo ' checked';} echo '><label for="How2">Plowed or Disked under</label></input>
  <input type="radio" name="HowKilled" id="How3" value="2"'; if ($arr[7] == 2) {echo ' checked';} echo '><label for="How3">Harvested</label></input><input type="radio" name="HowKilled" id="How4" value="3"'; if ($arr[7] == 3) {echo ' checked';} echo '><label for="How4">Other</label></input>
  <br />Date:<input type="date" value="'.$arr[8].'" name="DateKilled"></input>
    Notes:<input type="text" value="'.$arr[9].'" name="Notes"></input>
  <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
  </form></div>';
?>
<script>
function stop(y) {
  var x = document.getElementById("Manure");
  x.value = y;
}
</script>
</body>
</html>
