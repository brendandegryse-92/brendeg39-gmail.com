<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head><link rel="stylesheet" href="styles.css"/>
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
      <td>Applicator</td>
      <td>App Type</td>
      <td>Date Applied</td>
      <td>Stop Time</td>
      <td>Conditions</td>
      <td>Reconcile Date</td>
      <td>Field From</td>
      <td>Field To</td>
      <td>Auto Steer Heading</td>
      <td class="button"><button onclick="submit()"> Submit </button></td>
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
$sql = "SELECT GenAppID, Applicator, AppType, DateApplied, StopTime, Conditions, ReconcileDate, FieldFrom, FieldTo, AutoSteerHeading FROM appgeninfo WHERE UserID = ? AND GenAppID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID'], $_SESSION['PrimeID']]);
echo $_SESSION['PrimeID'];
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
foreach ($arr as $i=>$val) {
  array_push($_SESSION['rowPrimaryID'], $val[0]);
  newRow($i, $val[1], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8], $val[9]);
  $rowIndex[$i] = $i;}
      function newRow($rowNm, $Applicator, $AppType, $DateApplied, $StopTime, $Conditions, $ReconcileDate, $FieldFrom, $FieldTo, $AutoSteerHeading) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input value="'.$Applicator.'"/></td>';
        echo '<td><input value="'.$AppType.'"/></td>';
        echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$DateApplied.'"/></td>';
        echo '<td><input value="'.$StopTime.'"/></td>';
        echo '<td><input value="'.$Conditions.'"/></td>';
        echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$ReconcileDate.'"/></td>';
        echo '<td><input type="number" value="'.$FieldFrom.'"/></td>';
        echo '<td><input type="number" value="'.$FieldTo.'"/></td>';
        echo '<td><input value="'.$AutoSteerHeading.'"/></td>';
          echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
          echo "</tr>";
          echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
       ?>
        <script>
        function clearRow(x){
          var form = document.getElementsByTagName("form");
          for (var i=0; i < form[x].length; i++) {
          form[x][i].value = "";
          }
        }
        function dropdown(x) {
          var x = document.getElementById("select"+ x);
          x.style.display = "inline-block";
        }
        function dropclose(x) {
          var x = document.getElementById("select"+ x);
          x.style.display = "none";
        }
        function submit() {
          var forms = document.getElementsByTagName("form");
          var text = "";
          var json;
          var xmlhttp = new XMLHttpRequest();
          var myObj;
          var x=0;
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }
                  json = {Applicator : forms[x][0].value, AppType : forms[x][1].value, DateApplied : forms[x][2].value, StopTime : forms[x][3].value, Conditions : forms[x][4].value,
                  ReconcileDate : forms[x][5].value, FieldFrom : forms[x][6].value, FieldTo : forms[x][7].value, AutoSteerHeading : forms[x][8].value, tableName : "appgeninfo", length : 2, counter : 0};
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", false);
                  xmlhttp.send(json);
            location.href = "forms.php";
          };
        </script>
</body>
</html>
