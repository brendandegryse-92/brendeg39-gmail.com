</html>
sion_start();
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
  if (isset($_POST['Manure'])) {
  if ($_POST['delete'] == "on") {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
    $sql = "DELETE FROM manure WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDManure']]);
    $_POST['delete'] == "off";
    header("Location: manure.php");}
  else {
    $sql = "DELETE FROM manure WHERE ID = ? And UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: manure.php");
  }
  }
  else {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'UPDATE manure SET Manure = ?, AppType = ?, Time = ?, Availability = ?, AppTiming = ?, AmountPerAcre = ?, StateOfMatter = ?, NPK = ?, Notes = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'] ,$_POST['StateOfMatter'], $_POST['NPK'], $_POST['Notes'], $_COOKIE['PrimeIDManure']]);
  header("Location: manure.php");}
  else {
  $sql = 'UPDATE manure SET Manure = ?, AppType = ?, Time = ?, Availability = ?, AppTiming = ?, AmountPerAcre = ?, StateOfMatter = ?, NPK = ?, Notes = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'] ,$_POST['StateOfMatter'], $_POST['NPK'], $_POST['Notes'], $_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
  header("Location: manure.php");}
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
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'fertapps.php';}">Add Fertilizer</a><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'manure.php';}">Add Manure</a>
  <img src="https://upgradeag.com/CIG/img/LogoNutrientStar.jpg" />
  <img src="https://upgradeag.com/CIG/img/logoamplify.jpg" />
</nav><br /><div class="main"><h1><?php
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
  <div class="newspaper">
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
$sql = 'SELECT * FROM manure WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDManure']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);}
  else {
$sql = 'SELECT * FROM manure WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);}
echo '
    <br />Manure:<select name="Manure1" onchange="setManure()" id="Box"><option name="Manure1" value=""></option><option  name="Manure1" id="Manure1" value="Swine">Swine</option><option name="Manure1" id="Manure2" value="Beef">Beef</option><option type="radio" name="Manure1" id="Manure3" value="Dairy"><label for="Manure3">Dairy</label></option><option type="radio" name="Manure1" id="Manure4" value="Layer"><label for="Manure4">Layer</label></option><option type="radio" name="Manure1" id="Manure5" value="Broiler"><label for="Manure5">Broiler</label></option><option type="radio" name="Manure1" id="Manure6" value="Turkey"><label for="Manure6">Turkey</label></option><option type="radio" name="Manure1" id="Manure7" value="Layer Pullet"><label for="Manure7">Layer Pullet</label></option></select>
    <input type="text" id="Manure" name="Manure" value="'.$arr[2].'"></input><br />
    App Type:<select name="AppType"><option name="StateOfMatter" value="10"></option><option type="radio" name="StateOfMatter" id="App1" value="0"'; if ($arr[3] == 0) {echo ' selected';} echo '><label for="App1">Surface Applied</label></option><option type="radio" name="StateOfMatter" id="App2" value="1"'; if ($arr[3] == 1) {echo ' selected';} echo '><label for="App2">Incorporated</label></option><option type="radio" name="StateOfMatter" id="App3" value="2"'; if ($arr[3] == 2) {echo ' selected';} echo '><label for="App3">Injected</label></option><br /></select>
    Time:<input type="time" value="'.$arr[4].'" name="Time"></input>
    Availability:<input type="text" value="'.$arr[5].'" name="Availability"></input>
    <br />App Timing:<select name="AppTiming"><option name="AppTiming" value="10"></option><option type="radio" name="AppTiming" id="AppT1" value="0"'; if ($arr[6] == 0) {echo ' selected';} echo '><label for="AppT1">Fall</label></option><option type="radio" name="AppTiming" id="AppT2" value="1"'; if ($arr[6] == 1) {echo ' selected';} echo '><label for="AppT2">Spring</label></option><option type="radio" name="AppTiming" id="AppT3" value="2"'; if ($arr[6] == 2) {echo ' selected';} echo '><label for="AppT3">Both</label></option></select>
    Amount Per Acre:<input type="number" value="'.$arr[7].'" name="AmountPerAcre"></input><br />
    <br /><select name="StateOfMatter"><option name="StateOfMatter" value="10"></option><option type="radio" name="StateOfMatter" id="SoM1" value="0"'; if ($arr[8] == 0) {echo ' selected';} echo '><label for="SoM1">Solid</label></option><option type="radio" name="StateOfMatter" id="SoM2" value="1"'; if ($arr[8] == 1) {echo ' selected';} echo '><label for="SoM2">Liquid</label></option></select>
    NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" value="'.$arr[9].'" name="NPK"></input><br />
    Notes:<input type="text" value="'.$arr[10].'" name="Notes"></input><br />
    <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
  </form></div></div>';
?>
<script>
function stop(y) {
  var x = document.getElementById("Manure");
  x.value = y;
}
function setManure(x) {
  var form = document.getElementById("Manure");
  var box = document.getElementById("Box");
  var selected = box.options[box.selectedIndex];
  form.value = selected.value;
}
</script>
</body>
</html>
