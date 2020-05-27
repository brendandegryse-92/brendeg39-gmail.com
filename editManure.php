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
$sql = 'SELECT * FROM manure WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
    Manure:<input onclick="stop(\'Swine\')" type="radio" name="Manure1" value="Swine">Swine</input><input onclick="stop(\'Beef\')" type="radio" name="Manure1" value="Beef">Beef</input><input onclick="stop(\'Dairy\')" type="radio" name="Manure1" value="Dairy">Dairy</input><input onclick="stop(\'Layer\')" type="radio" name="Manure1" value="Layer">Layer</input><input onclick="stop(\'Broiler\')" type="radio" name="Manure1" value="Broiler">Broiler</input><input onclick="stop(\'Turkey\')" type="radio" name="Manure1" value="Turkey">Turkey</input><input type="radio" onclick="stop(\'Layer Pullet\')" name="Manure1" value="Layer Pullet">Layer Pullet</input>
    <input type="text" id="Manure" name="Manure" value="'.$arr[2].'"></input>
    App Type:<input type="radio" name="StateOfMatter" value="0"'; if ($arr[3] == 0) {echo ' checked';} echo '>Surface Applied</input><input type="radio" name="StateOfMatter" value="1"'; if ($arr[3] == 1) {echo ' checked';} echo '>Incorporated</input><input type="radio" name="StateOfMatter" value="2"'; if ($arr[3] == 2) {echo ' checked';} echo '>Injected</input>
    Time:<input type="time" value="'.$arr[4].'" name="Time"></input>
    Availability:<input type="text" value="'.$arr[5].'" name="Availability"></input>
    App Timing:<input type="radio" name="AppTiming" value="0"'; if ($arr[6] == 0) {echo ' checked';} echo '>Fall</input><input type="radio" name="AppTiming" value="1"'; if ($arr[6] == 1) {echo ' checked';} echo '>Spring</input><input type="radio" name="AppTiming" value="2"'; if ($arr[6] == 2) {echo ' checked';} echo '>Both</input>
    Amount Per Acre:<input type="number" value="'.$arr[7].'" name="AmountPerAcre"></input>
    <input type="radio" name="StateOfMatter" value="0"'; if ($arr[8] == 0) {echo ' checked';} echo '>Solid</input><input type="radio" name="StateOfMatter" value="1"'; if ($arr[8] == 1) {echo ' checked';} echo '>Liquid</input>
    NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" value="'.$arr[9].'" name="NPK"></input>
    <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
  </form>';
  if (isset($_POST['Manure'])) {
  if ($_POST['delete'] == "on") {
    $sql = "DELETE FROM manure WHERE ID = ? And UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: manure.php");
  }
  else {
  $sql = 'UPDATE manure SET Manure = ?, AppType = ?, Time = ?, Availability = ?, AppTiming = ?, AmountPerAcre = ?, StateOfMatter = ?, NPK = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'] ,$_POST['StateOfMatter'], $_POST['NPK'], $_COOKIE['PrimeIDManure'], $_SESSION['ID']]);
  header("Location: manure.php");
  }
}
?>
<script>
function stop(y) {
  var x = document.getElementById("Manure");
  x.value = y;
}
</script>
</body>
</html>
