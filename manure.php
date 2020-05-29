<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
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
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a><div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Manure:<input onclick="stop('Swine')" type="radio" id="Manure1" name="Manure1" value="Swine"><label for="Manure1">Swine</label></input><input onclick="stop('Beef')" type="radio" id="Manure2" name="Manure1" value="Beef"><label for="Manure2">Beef</label></input><input onclick="stop('Dairy')" type="radio" id="Manure3" name="Manure1" value="Dairy"><label for="Manure3">Dairy</label></input><input onclick="stop('Layer')" type="radio" id="Manure4" name="Manure1" value="Layer"><label for="Manure4">Layer</label></input><input onclick="stop('Broiler')" type="radio" id="Manure5" name="Manure1" value="Broiler"><label for="Manure5">Broiler</label></input><input onclick="stop('Turkey')" type="radio" id="Manure6" name="Manure1" value="Turkey"><label for="Manure6">Turkey</label></input><input type="radio" id="Manure7" onclick="stop('Layer Pullet')" name="Manure1" value="Layer Pullet"><label for="Manure7">Layer Pullet</label></input>
    <input type="text" id="Manure" name="Manure"></input>
    App Type:<input type="radio" name="AppType" id="App1" value="0"><label for="App1">Surface Applied</label></input><input type="radio" name="AppType" id="App2" value="1"><label for="App2">Incorporated</label></input><input type="radio" id="App3" name="AppType" value="2"><label for="App3">Injected</label></input>
    Time:<input type="time" name="Time"></input>
    Availability:<input type="text" name="Availability"></input>
    App Timing:<input type="radio" name="AppTiming" id="AppT1" value="0"><label for="AppT1">Fall</label></input><input type="radio" name="AppTiming" id="AppT2" value="1"><label for="AppT2">Spring</label></input><input type="radio" id="AppT3" name="AppTiming" value="2"><label for="AppT3">Both</label></input>
    Gallons or Tons of Manure Per Acre:<input type="number" name="AmountPerAcre"></input>
    <input type="radio" name="StateOfMatter" id="SoM1" value="0"><label for="SoM1">Solid</label></input><input type="radio" name="StateOfMatter" id="SoM2" value="1"><label for="SoM2">Liquid</label></input>
    NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" name="NPK"></input>
    <input type="submit"></input>
  </form></div>
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
