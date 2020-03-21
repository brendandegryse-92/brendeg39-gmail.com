<html>
<title>Seed Prices</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
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
  <a href="applicants.php">Applicants</a>
  <a href="#Chemicals">Chemicals</a>
  <a href="#Feritalizers">Feritalizers</a>
  <a href="forms.php">Forms</a>
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
    <div class="toprow">
    <tr>
      <th>Seed</th>
      <th>Variety</th>
      <th>Seeds Per Unit</th>
      <th>Entered Unit</th>
      <th>Purchased Unit</th>
      <th>Show On Report</th>
      <th>Active</th>
      <th>Prices</th>
    </tr>
  </div>
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
  $rowIndex = array(0);
  $_SESSION['rowPrimaryID'] = array();
  $_SESSION['counter'] = 0;
  $GLOBALS['rows'] = array(array());
  $sql = "SELECT ID, Name, Variety, SeedsPerUnit, EnteredUnit, PurchasedUnits, ShowOnReport, IsActive FROM seeds WHERE UserID = ? ORDER BY Name ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    foreach ($val as $key => $value) {
      if ($value == "") {
        $arr[$i][$key] = "--";
      }
    }
  }
  $_SESSION['rowPrimaryID'] = array();
  foreach ($arr as $i=>$val) {
    $_SESSION['rowPrimaryID'][$i] = $val[0];
    echo '<tr><td onclick="load('.$i.')" class="noshadow">'.$val[1].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[2].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[3].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[4].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[5].'</td>';
    if ($val[6] == 1) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" checked/></td>';}
    if ($val[6] == 0) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" /></td>';}
    if ($val[7] == 1) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" checked/></td>';}
    if ($val[7] == 0) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" /></td>';}
    echo '<td class="noshadow"><a class="buttons" onclick="loadprices('.$i.')">Prices</a></td>';
    echo '</tr>';
    if ($i == count($arr)-1) {
      echo '</table><a href="seedpricesnew.php" class="buttons">New Row</a>';
    }
  }
    array_push($_SESSION['rowPrimaryID'], -1);
       ?>
        <script>
        function loadprices(x) {
          var xmlhttp = new XMLHttpRequest();
          json = {tableName : "PrimeID", PrimeID : x};
          json = JSON.stringify(json);
          xmlhttp.open("POST", "submit.php", false);
          xmlhttp.send(json);
          location.href = "seedpriceyears.php";
        };
        function load(x) {
          var xmlhttp = new XMLHttpRequest();
          json = {tableName : "PrimeID", PrimeID : x};
          json = JSON.stringify(json);
          xmlhttp.open("POST", "submit.php", false);
          xmlhttp.send(json);
          location.href = "seedprices.php";
        };
        </script>
</body>
</html>
