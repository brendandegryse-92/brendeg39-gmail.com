</html>
ession_start();
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Passterm";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
  ?>
  <html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
  <style>
    #Add {
      display: none;
    }
  </style>
</head>
<body>
  <nav class="sidenav">
  <a class="sidenavmain" style = "margin-top: 10px;" href="other.php">Grower</a>
</nav><div class="main"><table><tr><th>Dropbox Num</th><th>Consultant</th><th>State</th><th>FieldId</th><th>Boundary</th><th>Spatial Plot Location</th><th>Notes</th></tr><?php
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
$sql = 'SELECT * FROM inventory ORDER BY Boundary ASC, SpatialPlotLocation ASC, FieldID';
$stmt = $connection->prepare($sql);
$stmt->execute([]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    echo '<tr>';
    foreach ($val as $key => $value) {
      if ($key > 0 && $key != 5 && $key != 6) {
      echo '<td>'.$value.'</td>';
    }
    elseif ($key == 5) {
        if ($value == 0) {echo '<td><input type="checkbox"/></td>';}
        if ($value == 1) {echo '<td><input type="checkbox" checked/></td>';}
    }
    elseif ($key == 6) {
        if ($value == 0) {echo '<td><input type="checkbox"/></td>';}
        if ($value == 1) {echo '<td><input type="checkbox" checked/></td>';}
    }
    }
    echo '</tr>';
  }
?>
 </table>
 </div>
</body>
</html>
