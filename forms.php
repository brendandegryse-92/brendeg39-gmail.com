<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
<style>
  tr:nth-child(even) {
  background-color: #f2f2f2;}

  .noshadow {
    filter: none;
  }
</style>
</head>
<body>
<h1><a href="index.php" class="head">Simplified Technology Services Inc.</a></h1>
<div class="nav">
  <a href="operators.php">Operators</a>
  <a href="farms.php">Farms</a>
  <a href="fields.php">Fields</a>
  <a href="prices.php">Prices</a>
  <a href="crop.php">Crop</a>
  <a href="applicants.php">Applications</a>
  <a href="#Chemicals">Chemicals</a>
  <a href="#Feritalizers">Feritalizers</a>
  <a class="activeNav" href="forms.php">Forms</a>
  <?php
  session_start();
  if($_SESSION['ID'] < 1) {header('Location: login.php');}
  $server = "localhost";
  $uname = "client";
  $pword = "Pass";
try {
  $connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
if ($_SESSION['ID'] == null) {
  echo '<a href="login.php" class="Login">Login</a>';
}
else {
$sql = "SELECT name FROM users WHERE UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$name = $stmt->fetch();
echo '<a href="account.php">'.$name[0].'</a>';
}
  ?>
  </div>
  <table>
    <tr>
      <th>Applicator</th>
      <th>AppType</th>
      <th>DateApplied</th>
      <th>StopTime</th>
      <th>Conditions</th>
      <th>ReconcileDate</th>
      <th>FieldFrom</th>
      <th>FieldTo</th>
      <th>AutoSteerHeading</th>
    </tr>
  <?php
  session_start();
  $server = "localhost";
  $uname = "client";
  $pword = "Pass";
try {
  $connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
$sql = 'SELECT GenAppID, Applicator, AppType, DateApplied, StopTime, Conditions, ReconcileDate, FieldFrom, FieldTo, AutoSteerHeading FROM appgeninfo Where UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
$_SESSION['rowPrimaryID'] = array();
foreach ($arr as $i=>$val) {
  array_push($_SESSION['rowPrimaryID'], $val[0]);
  foreach ($val as $key => $value) {
    if ($value == "") {
      $arr[$i][$key] = "--";
    }
  }
}
foreach ($arr as $i=>$val) {
  echo '<tr onclick="load('.$i.')"><td class="noshadow">'.$val[1].'</td>';
  echo '<td class="noshadow">'.$val[2].'</td>';
  echo '<td class="noshadow">'.$val[3].'</td>';
  echo '<td class="noshadow">'.$val[4].'</td>';
  echo '<td class="noshadow">'.$val[5].'</td>';
  echo '<td class="noshadow">'.$val[6].'</td>';
  echo '<td class="noshadow">'.$val[7].'</td>';
  echo '<td class="noshadow">'.$val[8].'</td>';
  echo '<td class="noshadow">'.$val[9].'</td>';
  echo '</tr>';
}
?>
<script>
function load(x) {
  var xmlhttp = new XMLHttpRequest();
  json = {tableName : "PrimeID", PrimeID : x};
  json = JSON.stringify(json);
  xmlhttp.open("POST", "submit.php", false);
  xmlhttp.send(json);
  location.href = "formsubmit.php";
}
</script>
  </body>
  </html>
