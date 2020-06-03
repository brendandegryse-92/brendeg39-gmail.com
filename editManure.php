<?php
session_start();
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Passterm";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
  if (isset($_POST['Manure'])) {
  if ($_POST['delete'] == "on") {
    $sql = "DELETE FROM manure WHERE ID = ? And UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: manure.php");
  }
  else {
  $sql = 'UPDATE manure SET Manure = ?, AppType = ?, Time = ?, Availability = ?, AppTiming = ?, AmountPerAcre = ?, StateOfMatter = ?, NPK = ?, Notes = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'] ,$_POST['StateOfMatter'], $_POST['NPK'], $_POST['Notes'], $_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
  header("Location: manure.php");
  }
}
?>
<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="http://upgradeag.com/CIG/img/favicon.ico">
</head>
<body><h1><?php
session_start();
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Passterm";
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
$pword = "Passterm";
try {
$connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
}
$sql = 'SELECT * FROM manure WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
    <br />Manure:<input onclick="stop(\'Swine\')" type="radio" name="Manure1" id="Manure1" value="Swine"><label for="Manure1">Swine</label></input><input onclick="stop(\'Beef\')" type="radio" name="Manure1" id="Manure2" value="Beef"><label for="Manure2">Beef</label></input><input onclick="stop(\'Dairy\')" type="radio" name="Manure1" id="Manure3" value="Dairy"><label for="Manure3">Dairy</label></input><input onclick="stop(\'Layer\')" type="radio" name="Manure1" id="Manure4" value="Layer"><label for="Manure4">Layer</label></input><input onclick="stop(\'Broiler\')" type="radio" name="Manure1" id="Manure5" value="Broiler"><label for="Manure5">Broiler</label></input><input onclick="stop(\'Turkey\')" type="radio" name="Manure1" id="Manure6" value="Turkey"><label for="Manure6">Turkey</label></input><input type="radio" onclick="stop(\'Layer Pullet\')" name="Manure1" id="Manure7" value="Layer Pullet"><label for="Manure7">Layer Pullet</label></input>
    <input type="text" id="Manure" name="Manure" value="'.$arr[2].'"></input><br />
    App Type:<input type="radio" name="StateOfMatter" id="App1" value="0"'; if ($arr[3] == 0) {echo ' checked';} echo '><label for="App1">Surface Applied</label></input><input type="radio" name="StateOfMatter" id="App2" value="1"'; if ($arr[3] == 1) {echo ' checked';} echo '><label for="App2">Incorporated</label></input><input type="radio" name="StateOfMatter" id="App3" value="2"'; if ($arr[3] == 2) {echo ' checked';} echo '><label for="App3">Injected</label></input><br />
    Time:<input type="time" value="'.$arr[4].'" name="Time"></input>
    Availability:<input type="text" value="'.$arr[5].'" name="Availability"></input>
    <br />App Timing:<input type="radio" name="AppTiming" id="AppT1" value="0"'; if ($arr[6] == 0) {echo ' checked';} echo '><label for="AppT1">Fall</label></input><input type="radio" name="AppTiming" id="AppT2" value="1"'; if ($arr[6] == 1) {echo ' checked';} echo '><label for="AppT2">Spring</label></input><input type="radio" name="AppTiming" id="AppT3" value="2"'; if ($arr[6] == 2) {echo ' checked';} echo '><label for="AppT3">Both</label></input>
    Amount Per Acre:<input type="number" value="'.$arr[7].'" name="AmountPerAcre"></input><br />
    <br /><input type="radio" name="StateOfMatter" id="SoM1" value="0"'; if ($arr[8] == 0) {echo ' checked';} echo '><label for="SoM1">Solid</label></input><input type="radio" name="StateOfMatter" id="SoM2" value="1"'; if ($arr[8] == 1) {echo ' checked';} echo '><label for="SoM2">Liquid</label></input>
    NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" value="'.$arr[9].'" name="NPK"></input><br />
    Notes:<input type="text" value="'.$arr[10].'" name="Notes"></input><br />
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
