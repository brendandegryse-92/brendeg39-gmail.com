<!DOCTYPE html>
<meta name="description" content="Forms">
<html><title>Forms</title>
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
  <div include="head.html"></div>
  <div style="overflow: auto;">
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
  $color = "";
try {
  $connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
$sql = 'SELECT GenAppID, Applicator, AppType, DateApplied, StopTime, Conditions, ReconcileDate, FieldFrom, FieldTo, AutoSteerHeading, Type FROM appgeninfo Where UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr) > 0) {
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
  if ($val[10] == "fertilizer") {$color = "brown";}
  if ($val[10] == "chemical") {$color = "lightgreen";}
  if ($val[10] == "misc") {$color = "orange";}
  echo '<tr style="background-color: '.$color.';" onclick="load('.$i.')"><td class="noshadow">'.$val[1].'</td>';
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
}
else {
  echo '<tr><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td></tr>';
}
?>
<script>
function load(x) {
  var xmlhttp = new XMLHttpRequest();
  json = {tableName : "PrimeID", PrimeID : x};
  json = JSON.stringify(json);
  xmlhttp.open("POST", "submit.php", true);
  xmlhttp.send(json);
  location.href = "formsubmit.php";
}
</script><script type="text/javascript" src="headjs.js"></script>
<script>
highlight();
function highlight() {
var x = "forms";
try {
document.getElementById(x).className += " activeNav";
  }
catch(err) {window.setTimeout(highlight, 100);
    }
}
</script>
  </body>
  </html>
