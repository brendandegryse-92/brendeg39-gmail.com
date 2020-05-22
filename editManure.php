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
$sql = 'SELECT * FROM manure WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDManure']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
    Manure:<input type="text" value="'.$arr[2].'" name="Manure"></input>
    App Type:<input type="text" value="'.$arr[3].'" name="AppType"></input>
    Time:<input type="time" value="'.$arr[4].'" name="Time"></input>
    Availability:<input type="text" value="'.$arr[5].'" name="Availability"></input>
    App Timing:<input type="text" value="'.$arr[6].'" name="AppTiming"></input>
    Amount Per Acre:<input type="number" value="'.$arr[7].'" name="AmountPerAcre"></input>
    NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" value="'.$arr[8].'" name="NPK"></input>
    <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
  </form>';
  if (isset($_POST['Manure'])) {
  if ($_POST['delete'] == "on") {
    $sql = "DELETE FROM manure WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDManure']]);
    $_POST['delete'] == "off";
    header("Location: other.php");
  }
  else {
  $sql = 'UPDATE manure SET Manure = ?, AppType = ?, Time = ?, Availability = ?, AppTiming = ?, AmountPerAcre = ?, NPK = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'], $_POST['NPK'], $_COOKIE['PrimeIDManure']]);
  header("Location: manure.php");
  }
}
?>
<script>
</script>
</body>
</html>
