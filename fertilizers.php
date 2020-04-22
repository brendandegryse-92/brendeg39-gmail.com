<html>
<title>Fertilizer Prices</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
  <style>
  .buttons {
    padding: 3px;
    border-radius: 7px;
    text-decoration: none;
    color: white;
    background-color: #3d3c38;
  }
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
    <div class="toprow">
    <tr>
        <th>Fertilizer</th>
        <th>EnteredUnits</th>
        <th>PurchasedUnits</th>
        <th>Ratio</th>
        <th>ShowOnReport</th>
        <th>Active</th>
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
  $sql = "SELECT ID, Name, EnteredUnits, PurchasedUnits, Ratio, ShowOnReport, IsActive FROM fertilizers WHERE UserID = ? ORDER BY Name ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  if (count($arr) > 0) {
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
    if ($val[5] == 1) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" checked/></td>';}
    if ($val[5] == 0) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" /></td>';}
    if ($val[6] == 1) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" checked/></td>';}
    if ($val[6] == 0) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" /></td>';}
    echo '<td class="noshadow"><a class="buttons" onclick="loadprices('.$i.')">Prices</a></td>';
    echo '</tr>';}
    if ($i == count($arr)-1) {
      echo '</table></div><a href="fertilizerpricesnew.php" class="buttons">New Row</a>';
    }
  }
  else {
    echo '<tr><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td></tr>';
    echo '</table></div><a href="fertilizerpricesnew.php" class="buttons">New Row</a>';
  }
    array_push($_SESSION['rowPrimaryID'], -1);
       ?>
     </div>
     <br/><a href="importFertilizers.php">Import</a>
        <script>
        function loadprices(x) {
          var xmlhttp = new XMLHttpRequest();
          json = {tableName : "PrimeID", PrimeID : x};
          json = JSON.stringify(json);
          xmlhttp.open("POST", "submit.php", false);
          xmlhttp.send(json);
          location.href = "fertilizerpriceyears.php";
        };
        function load(x) {
          var xmlhttp = new XMLHttpRequest();
          json = {tableName : "PrimeID", PrimeID : x};
          json = JSON.stringify(json);
          xmlhttp.open("POST", "submit.php", false);
          xmlhttp.send(json);
          location.href = "fertilizerprices.php";
        };
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "prices";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
