<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Manure:<input type="text" name="Manure"></input>
    App Type:<input type="text" name="AppType"></input>
    Time:<input type="time" name="Time"></input>
    Availability:<input type="text" name="Availability"></input>
    App Timing:<input type="text" name="AppTiming"></input>
    Amount Per Acre:<input type="number" name="AmountPerAcre"></input>
    NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" name="NPK"></input>
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
$sql = 'SELECT * FROM manure WHERE FieldID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr)>0) {
  echo '<table><tr><th>Manure</th><th>AppType</th><th>Time</th><th>Availability</th><th>AppTiming</th><th>AmountPerAcre</th><th>NPK</th></tr>';
foreach ($arr as $i=>$val) {
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 1 && $key != 8) {
    echo '<td>'.$value.'</td>';
  }
  elseif ($key == 8) {
    echo '<td>'.$value.'</td>';
  }
  }
  echo '</tr>';
}
}
str_replace("%","",$_POST['NPK']);
  if ($_POST['Manure'] != "") {
  $sql = 'INSERT INTO manure (FieldID, Manure,	AppType,	Time,	Availability,	AppTiming,	AmountPerAcre, NPK) VALUES (?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField'], $_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'], $_POST['NPK']]);
  $_POST['Manure'] = "";
  header("Location: manure.php");
  }
?>
<script>
function edit(x) {
  document.cookie="PrimeIDManure=" + x;
  location.href = "editManure.php";
}
</script>
</body>
</html>
