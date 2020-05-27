<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
session_start();
$server = "localhost";
$uname = "client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
$sql = 'SELECT * FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
  Field Name:<input type="text" value="'.$arr[2].'" name="FieldName"></input>
  Acres:<input type="number" value="'.$arr[3].'" name="Acres"></input>
  County:<input type="text" value="'.$arr[4].'" name="County"></input>
  Township:<input type="text" value="'.$arr[5].'" name="Township"></input>
  Section:<input type="text" value="'.$arr[6].'" name="Section"></input>
  Quarter:<input type="radio" name="Quarter" value="0"'; if ($arr[7] == 0) {echo ' checked';} echo '>NE</input><input type="radio" name="Quarter" value="1"'; if ($arr[7] == 1) {echo ' checked';} echo '>SE</input>
  <input type="radio" name="Quarter" value="2"'; if ($arr[7] == 2) {echo ' checked';} echo '>NW</input><input type="radio" name="Quarter" value="3"'; if ($arr[7] == 3) {echo ' checked';} echo '>SW</input>
  Tillage:<input type="radio" name="Tillage" value="0"'; if ($arr[8] == 0) {echo ' checked';} echo '>No Till</input><input type="radio" name="Tillage" value="1"'; if ($arr[8] == 1) {echo ' checked';} echo '>Minimum Till</input>
  <input type="radio" name="Tillage" value="2"'; if ($arr[8] == 2) {echo ' checked';} echo '>Fall</input><input type="radio" name="Tillage" value="3"'; if ($arr[8] == 3) {echo ' checked';} echo '>Spring</input><input type="radio" name="Tillage" value="4"'; if ($arr[8] == 4) {echo ' checked';} echo '>Strip Till</input>
  Planting Date:<input type="date" value="'.$arr[9].'" name="Plantingdate"></input>
  2019 Crop:<input type="text" value="'.$arr[10].'" name="LastYearCrop"></input>
  How Many Years Corn:<input type="number" value="'.$arr[11].'" name="YearsCorn"></input>
  Irrigated:<input type="number" value="'.$arr[12].'" name="Irrigated"></input>
  Rotational:<input type="text" value="'.$arr[13].'" name="Rotational"></input>
  Crop Year:<input type="number" value="'.$arr[14].'" name="CropYear"></input>
  Cover Crop:<input type="text" value="'.$arr[15].'" name="CoverCrop"></input>
  Date Seeded:<input type="date" value="'.$arr[16].'" name="DateSeeded"></input>
  How Was It Seeded:<input type="text" value="'.$arr[17].'" name="HowSeeded"></input>
  Ncredits:<input type="number" value="'.$arr[18].'" name="Ncredits"></input>
  How Was It Killed:<input type="radio" name="HowKilled" value="0"'; if ($arr[19] == 0) {echo ' checked';} echo '>Chemical burn down</input><input type="radio" name="HowKilled" value="1"'; if ($arr[19] == 1) {echo ' checked';} echo '>Plowed or Disked under</input>
  <input type="radio" name="HowKilled" value="2"'; if ($arr[19] == 2) {echo ' checked';} echo '>Harvested</input><input type="radio" name="HowKilled" value="3"'; if ($arr[19] == 3) {echo ' checked';} echo '>Other</input>
  Date:<input type="date" value="'.$arr[20].'" name="DateKilled"></input>
  Number of years in the last 5 manure was applied:<input type="text" value="'.$arr[22].'" name="Last5"></input>
  Received manure 8 of last 10 years:<input type="radio" name="8of10" value="0"'; if ($arr[23] == 0) {echo ' checked';} echo '>Yes</input><input type="radio" name="8of10" value="1"'; if ($arr[23] == 1) {echo ' checked';} echo '>No</input>
  <input type="radio" name="8of10" value="2"'; if ($arr[23] == 2) {echo ' checked';} echo '>Don\'t Know</input>
  <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
</form><a href="manure.php">Manure</a><br><a href="fertapps.php">Fertilizer Applications</a>';
  if (isset($_POST['FieldName'])) {
  if ($_POST['delete'] == "on") {
    $sql = "DELETE FROM field WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: otherfield.php");
  }
  else {
  $sql = 'UPDATE field SET FieldName = ?,  Acres = ?,  County = ?,  Township = ?,  Section = ?,  Quarter = ?,  Tillage = ?,  Plantingdate = ?,  LastYearCrop = ?,  YearsCorn = ?,  Irrigated = ?,  Rotational = ?,  CropYear = ?,  CoverCrop = ?,  DateSeeded = ?,  How = ?,  Ncredits = ?,  HowKilled = ?,  DateKilled = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_COOKIE['PrimeIDField'], $_SESSION['ID']]);
  header("Location: otherfield.php");
  }
}
?>
<script>
</script>
</body>
</html>
