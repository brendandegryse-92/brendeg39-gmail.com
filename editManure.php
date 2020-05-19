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
$sql = 'SELECT * FROM manure WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
    Manure:<input type="text" value="'.$arr[2].'" name="Manure"></input>
    App Type:<input type="text" value="'.$arr[3].'" name="AppType"></input>
    Time:<input type="time" value="'.$arr[4].'" name="Time"></input>
    Availability:<input type="text" value="'.$arr[5].'" name="Availability"></input>
    App Timing:<input type="text" value="'.$arr[6].'" name="AppTiming"></input>
    Amount Per Acre:<input type="number" value="'.$arr[7].'" name="AmountPerAcre"></input>
    NPK:<input type="number" value="'.$arr[8].'" name="NPK"></input>
    <input type="submit"></input>
  </form>';
  if (isset($_POST['Manure'])) {
  $sql = 'UPDATE manure SET Manure = ?, AppType = ?, Time = ?, Availability = ?, AppTiming = ?, AmountPerAcre = ?, NPK = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'], $_POST['NPK'], $_COOKIE['PrimeID']]);
  header("Location: other.php");
  }
?>
<script>
</script>
</body>
</html>
