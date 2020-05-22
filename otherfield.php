<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Field Name:<input type="text" name="FieldName"></input>
    Acres:<input type="number" name="Acres"></input>
    County:<input type="text"name="County"></input>
    Township:<input type="text" name="Township"></input>
    Section:<input type="text" name="Section"></input>
    Quarter:<input type="radio" name="Quarter" value="0">NE</input><input type="radio" name="Quarter" value="1">SE</input><input type="radio" name="Quarter" value="2">NW</input><input type="radio" name="Quarter" value="3">SW</input>
    Tillage:<input type="radio" name="Tillage" value="0">No Till</input><input type="radio" name="Tillage" value="1">Minimum Till</input><input type="radio" name="Tillage" value="2">Fall</input><input type="radio" name="Tillage" value="3">Spring</input><input type="radio" name="Tillage" value="4">Strip Till</input>
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
    How Was It Killed:<input type="radio" name="HowKilled" value="0">Chemical burn down</input><input type="radio" name="HowKilled" value="1">Plowed or Disked under</input><input type="radio" name="HowKilled" value="2">Harvested</input><input type="radio" name="HowKilled" value="3">Other</input>
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
$stmt->execute([$_COOKIE['PrimeIDGrower']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr)>0) {
  echo '<table><tr><th>Field Name</th><th>Acres</th><th>County</th><th>Township</th><th>Section</th><th>Quarter</th><th>Tillage</th><th>Planting Date</th><th>Last Year\'s Crop</th><th>YearsCorn</th><th>Irrigated</th><th>Rotational</th><th>CropYear</th><th>CoverCrop</th><th>DateSeeded</th><th>How</th><th>Ncredits</th><th>HowKilled</th><th>DateKilled</th></tr>';
foreach ($arr as $i=>$val) {
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 1) {
      if ($key != 7 && $key != 19 && $key != 8) {
    echo '<td>'.$value.'</td>';}
    elseif ($key == 7) {
      if ($value == 0) {echo '<td>NE</td>';}
      if ($value == 1) {echo '<td>SE</td>';}
      if ($value == 2) {echo '<td>NW</td>';}
      if ($value == 3) {echo '<td>SW</td>';}
    }
    elseif ($key == 19) {
      if ($value == 0) {echo '<td>Chemical burn down</td>';}
      if ($value == 1) {echo '<td>Plowed or Disked under</td>';}
      if ($value == 2) {echo '<td>Harvested</td>';}
      if ($value == 3) {echo '<td>Other</td>';}
    }
    elseif ($key == 8) {
      if ($value == 0) {echo '<td>No Till</td>';}
      if ($value == 1) {echo '<td>Minimum Till</td>';}
      if ($value == 2) {echo '<td>Fall</td>';}
      if ($value == 3) {echo '<td>Spring</td>';}
      if ($value == 4) {echo '<td>Strip Till</td>';}
    }
  }
  }
  echo '</tr>';
}
}
  if ($_POST['FieldName'] != "") {
  $sql = 'INSERT INTO  field (GrowerID ,  FieldName ,  Acres ,  County ,  Township ,  Section ,  Quarter ,  Tillage ,  Plantingdate,  LastYearCrop ,  YearsCorn ,  Irrigated ,  Rotational ,  CropYear ,  CoverCrop ,  DateSeeded ,  How ,  Ncredits ,  HowKilled ,  DateKilled ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDGrower'], $_POST['FieldName'], $_POST['Acres'], $_POST['County'], $_POST['Township'], $_POST['Section'], $_POST['Quarter'], $_POST['Tillage'], $_POST['Plantingdate'], $_POST['LastYearCrop'], $_POST['YearsCorn'], $_POST['Irrigated'], $_POST['Rotational'], $_POST['CropYear'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled']]);
  $_POST['FieldName'] = "";
  header("Location: otherfield.php");
  }
?>
<script>
function edit(x) {
  document.cookie="PrimeIDField=" + x;
  location.href = "editField.php";
}
</script>
</body>
</html>
