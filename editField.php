<html>
<head>
</head>
<body>
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
$sql = 'SELECT * FROM field WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
  Field Name:<input type="text" value="'.$arr[2].'" name="FieldName"></input>
  Acres:<input type="number" value="'.$arr[3].'" name="Acres"></input>
  County:<input type="text" value="'.$arr[4].'" name="County"></input>
  Township:<input type="text" value="'.$arr[5].'" name="Township"></input>
  Section:<input type="text" value="'.$arr[6].'" name="Section"></input>
  Quarter:<input type="text" value="'.$arr[7].'" name="Quarter"></input>
  Tillage:<input type="text" value="'.$arr[8].'" name="Tillage"></input>
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
  How Was It Killed:<input type="text" value="'.$arr[19].'" name="HowKilled"></input>
  Date:<input type="date" value="'.$arr[20].'" name="DateKilled"></input>
  <input type="submit"></input>
</form><a href="otherfield.php">fields</a>';
  if (isset($_POST['FieldName'])) {
  $sql = 'UPDATE field SET FieldName = ?,  Acres = ?,  County = ?,  Township = ?,  Section = ?,  Quarter = ?,  Tillage = ?,  Plantingdate = ?,  LastYearCrop = ?,  YearsCorn = ?,  Irrigated = ?,  Rotational = ?,  CropYear = ?,  CoverCrop = ?,  DateSeeded = ?,  How = ?,  Ncredits = ?,  HowKilled = ?,  DateKilled = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_COOKIE['PrimeID']]);
  header("Location: other.php");
  }
?>
<script>
</script>
</body>
</html>
