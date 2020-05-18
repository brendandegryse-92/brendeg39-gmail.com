<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Field Name:<input type="text" name="FieldName"></input>
    Acres:<input type="number" name="Acres"></input>
    County:<input type="text"name="County"></input>
    Township:<input type="text" name="Township"></input>
    Section:<input type="text" name="Section"></input>
    Quarter:<input type="text" name="Quarter"></input>
    Tillage:<input type="text" name="Tillage"></input>
    Planting Date:<input type="date" name="Plantingdate"></input>
    2019 Crop:<input type="text" name="LastYearCrop"></input>
    How Many Years Corn:<input type="number" name="YearsCorn"></input>
    Irrigated:<input type="text" name="Irrigated"></input>
    Rotational:<input type="text" name="Rotational"></input>
    Crop Year:<input type="number" name="CropYear"></input>
    Cover Crop:<input type="text" name="CoverCrop"></input>
    Date Seeded:<input type="date" name="DateSeeded"></input>
    How Was It Seeded:<input type="text" name="HowSeeded"></input>
    Ncredits:<input type="number" name="Ncredits"></input>
    How Was It Killed:<input type="text" name="HowKilled"></input>
    Date:<input type="date" name="DateKilled"></input>
    <input type="submit"></input>
  </form>
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
$sql = 'SELECT * FROM field WHERE GrowerID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr)>0) {
  echo '<table><tr><th>Field Name</th><th>Acres</th><th>County</th><th>Township</th><th>Section</th><th>Quarter</th><th>Tillage</th><th>Planting Date</th><th>Last Year\'s crop</th><th>YearsCorn</th><th>Irrigated</th><th>Rotational</th><th>CropYear</th><th>CoverCrop</th><th>DateSeeded</th><th>How</th><th>Ncredits</th><th>HowKilled</th><th>DateKilled</th></tr>';
foreach ($arr as $i=>$val) {
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 1) {
    echo '<td>'.$value.'</td>';
  }
  }
  echo '</tr>';
}
}
  if ($_POST['FieldName'] != "") {
  $sql = 'INSERT INTO  field (GrowerID ,  FieldName ,  Acres ,  County ,  Township ,  Section ,  Quarter ,  Tillage ,  Plantingdate,  LastYearCrop ,  YearsCorn ,  Irrigated ,  Rotational ,  CropYear ,  CoverCrop ,  DateSeeded ,  How ,  Ncredits ,  HowKilled ,  DateKilled ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeID'], $_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled']]);
  }
?>
<script>
function edit(x) {
  document.cookie="PrimeID=" + x;
  location.href = "editField.php";
}
</script>
</body>
</html>
