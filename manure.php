<html>
<head>
</head>
<body><h1><?php
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
$sql = 'SELECT FieldName FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
echo $arr[0][0];
?></h1>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Manure:<input onclick="stop('Swine')" type="radio" name="Manure1" value="Swine">Swine</input><input onclick="stop('Beef')" type="radio" name="Manure1" value="Beef">Beef</input><input onclick="stop('Dairy')" type="radio" name="Manure1" value="Dairy">Dairy</input><input onclick="stop('Layer')" type="radio" name="Manure1" value="Layer">Layer</input><input onclick="stop('Broiler')" type="radio" name="Manure1" value="Broiler">Broiler</input><input onclick="stop('Turkey')" type="radio" name="Manure1" value="Turkey">Turkey</input><input type="radio" onclick="stop('Layer Pullet')" name="Manure1" value="Layer Pullet">Layer Pullet</input>
    <input type="text" id="Manure" name="Manure"></input>
    App Type:<input type="radio" name="AppType" value="0">Surface Applied</input><input type="radio" name="AppType" value="1">Incorporated</input><input type="radio" name="AppType" value="2">Injected</input>
    Time:<input type="time" name="Time"></input>
    Availability:<input type="text" name="Availability"></input>
    App Timing:<input type="radio" name="AppTiming" value="0">Fall</input><input type="radio" name="AppTiming" value="1">Spring</input><input type="radio" name="AppTiming" value="2">Both</input>
    Gallons or Tons of Manure Per Acre:<input type="number" name="AmountPerAcre"></input>
    <input type="radio" name="StateOfMatter" value="0">Solid</input><input type="radio" name="StateOfMatter" value="1">Liquid</input>
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
$sql = 'SELECT * FROM manure WHERE FieldID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr)>0) {
  echo '<table><tr><th>Manure</th><th>AppType</th><th>Time</th><th>Availability</th><th>AppTiming</th><th>AmountPerAcre</th><th>Solid/Liquid</th><th>NPK</th></tr>';
foreach ($arr as $i=>$val) {
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 1 && $key != 8) {
    echo '<td>'.$value.'</td>';
  }
  elseif ($key == 8) {
    if ($value == 0) {echo '<td>Solid</td>';}
    if ($value == 1) {echo '<td>Liquid</td>';}
  }
  }
  echo '</tr>';
}
}
$_POST['NPK'];
  if ($_POST['AppType'] != "") {
  $sql = 'INSERT INTO manure (FieldID, Manure,	AppType,	Time,	Availability,	AppTiming,	AmountPerAcre, StateOfMatter, NPK, UserID) VALUES (?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField'], $_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'], $_POST['StateOfMatter'], $_POST['NPK'], $_SESSION['ID']]);
  $_POST['AppType'] = "";
  header("Location: manure.php");
  }
?>
<script>
function stop(y) {
  var x = document.getElementById("Manure");
  x.value = y;
}
function edit(x) {
  document.cookie="PrimeIDManure=" + x;
  location.href = "editManure.php";
}
</script>
</body>
</html>
