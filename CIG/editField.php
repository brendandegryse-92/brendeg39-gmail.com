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
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
  if (isset($_POST['FieldName'])) {
  if ($_POST['delete'] == "on") {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
    $sql = "DELETE FROM field WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField']]);
    $_POST['delete'] == "off";
    header("Location: otherfield.php");}
  else{
    $sql = "DELETE FROM field WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: otherfield.php");}
  }
  else {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'UPDATE field SET FieldName = ?,  Acres = ?,  County = ?,  Township = ?,  Section = ?,  Quarter = ?,  Tillage = ?,  Plantingdate = ?,  LastYearCrop = ?,  YearsCorn = ?,  Irrigated = ?,  Rotational = ?,  CropYear = ?,  CoverCrop = ?,  DateSeeded = ?,  How = ?,  Ncredits = ?,  HowKilled = ?,  DateKilled = ?, Last5 = ?, 8of10 = ?, ProjectFieldName = ?, ProductName = ?, Notes = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Last5'], $_POST['8of10'], $_POST['ProjectFieldName'], $_POST['ProductName'], $_POST['Notes'], $_COOKIE['PrimeIDField']]);
  header("Location: otherfield.php");}
  else {
  $sql = 'UPDATE field SET FieldName = ?,  Acres = ?,  County = ?,  Township = ?,  Section = ?,  Quarter = ?,  Tillage = ?,  Plantingdate = ?,  LastYearCrop = ?,  YearsCorn = ?,  Irrigated = ?,  Rotational = ?,  CropYear = ?,  CoverCrop = ?,  DateSeeded = ?,  How = ?,  Ncredits = ?,  HowKilled = ?,  DateKilled = ?, Last5 = ?, 8of10 = ?, ProjectFieldName = ?, ProductName = ?, Notes = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Last5'], $_POST['8of10'], $_POST['ProjectFieldName'], $_POST['ProductName'], $_POST['Notes'], $_COOKIE['PrimeIDField'], $_SESSION['ID']]);
  header("Location: otherfield.php");}
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
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a>
  <div class="indented"><a onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'editField.php';}">Edit Field</a><br />
</div><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'fertapps.php';}">Add Fertilizer</a><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'manure.php';}">Add Manure</a><br />
  <img src="https://upgradeag.com/CIG/img/LogoNutrientStar.png" />
  <img src="https://upgradeag.com/CIG/img/logoamplify.png" />
</nav><br /><div class="main">
  <div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
session_start();
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
$sql = 'SELECT * FROM field WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);}
  else {
$sql = 'SELECT * FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);}
echo '
  Field Name:<input type="text" value="'.$arr[2].'" name="FieldName"></input>
  Field Name:<input type="text" value="'.$arr[3].'" name="ProjectFieldName"></input>
  Field Name:<input type="text" value="'.$arr[4].'" name="ProductName"></input>
  Acres:<input type="number" value="'.$arr[5].'" name="Acres"></input>
  County:<input type="text" value="'.$arr[6].'" name="County"></input>
  Township:<input type="text" value="'.$arr[7].'" name="Township"></input>
  Section:<input type="text" value="'.$arr[8].'" name="Section"></input><br />
  Quarter:<select name="Quarter"><option name="Quarter" value="10"></option><option name="Quarter" id="Quarter1" value="0"'; if ($arr[9] == 0) {echo ' selected';} echo '>NE</option><option name="Quarter" id="Quarter2" value="1"'; if ($arr[9] == 1) {echo ' selected';} echo '>SE</option>
  <option name="Quarter" id="Quarter3" value="2"'; if ($arr[9] == 2) {echo ' selected';} echo '>NW</option><option name="Quarter" id="Quarter4" value="3"'; if ($arr[9] == 3) {echo ' selected';} echo '>SW</option></select>
  <br />Tillage:<select name="Tillage"><option name="Tillage" value="10"></option><option type="radio" name="Tillage" id="Tillage1" value="0"'; if ($arr[10] == 0) {echo ' selected';} echo '>No Till</option><option name="Tillage" id="Tillage2" value="1"'; if ($arr[10] == 1) {echo ' selected';} echo '>Minimum Till</option>
  <option name="Tillage" id="Tillage3" value="2"'; if ($arr[10] == 2) {echo ' selected';} echo '>Fall</option><option name="Tillage" id="Tillage4" value="3"'; if ($arr[10] == 3) {echo ' selected';} echo '>Spring</option><option name="Tillage" id="Tillage5" value="4"'; if ($arr[10] == 4) {echo ' selected';} echo '>Strip Till</option></select>
  <br />Planting Date:<input type="date" value="'.$arr[11].'" name="Plantingdate"></input>
  2019 Crop:<input type="text" value="'.$arr[12].'" name="LastYearCrop"></input>
  How Many Years Corn:<input type="number" value="'.$arr[13].'" name="YearsCorn"></input>
  Irrigated:<input type="number" value="'.$arr[14].'" name="Irrigated"></input>
  Rotational:<input type="text" value="'.$arr[15].'" name="Rotational"></input>
  Crop Year:<input type="number" value="'.$arr[16].'" name="CropYear"></input>
  Cover Crop:<input type="text" value="'.$arr[17].'" name="CoverCrop"></input>
  Date Seeded:<input type="date" value="'.$arr[18].'" name="DateSeeded"></input>
  How Was It Seeded:<input type="text" value="'.$arr[19].'" name="HowSeeded"></input>
  Ncredits:<input type="number" value="'.$arr[20].'" name="Ncredits"></input><br />
  How Was It Killed:<select name="HowKilled"><option name="HowKilled" value="10"></option><option name="HowKilled" id="How1" value="0"'; if ($arr[21] == 0) {echo ' selected';} echo '>Chemical burn down</option><option name="HowKilled" id="How2" value="1"'; if ($arr[21] == 1) {echo ' selected';} echo '>Plowed or Disked under</input>
  <option name="HowKilled" id="How3" value="2"'; if ($arr[21] == 2) {echo ' selected';} echo '>Harvested</option><option name="HowKilled" id="How4" value="3"'; if ($arr[21] == 3) {echo ' selected';} echo '>Other</option></select>
  <br />Date:<input type="date" value="'.$arr[22].'" name="DateKilled"></input>
  Number of years in the last 5 manure was applied:<input type="text" value="'.$arr[23].'" name="Last5"></input><br />
  Received manure 8 of last 10 years:<select name="8of10"><option name="8of10" value="10"></option><option name="8of10" id="8of101" value="0"'; if ($arr[24] == 0) {echo ' selected';} echo '>Yes</option><option name="8of10" id="8of102" value="1"'; if ($arr[24] == 1) {echo ' selected';} echo '>No</option>
  <br /><option name="8of10" id="8of103" value="2"'; if ($arr[24] == 2) {echo ' selected';} echo '>Don\'t Know</option><br /></select>
    Notes:<input type="text" value="'.$arr[25].'" name="Notes"></input>
  <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
</form></div><a href="map.php">Field Map</a></div>';?>
<script>
</script>
</body>
</html>
