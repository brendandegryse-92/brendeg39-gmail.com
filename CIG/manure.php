<?php
  session_start();
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Pass";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
    if ($_POST['AppType'] != "") {
    $sql = 'INSERT INTO manure (FieldID, Manure,	AppType,	Time,	Availability,	AppTiming,	AmountPerAcre, StateOfMatter, NPK, Notes, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_POST['Manure'], $_POST['AppType'], $_POST['Time'], $_POST['Availability'], $_POST['AppTiming'], $_POST['AmountPerAcre'], $_POST['StateOfMatter'], $_POST['NPK'], $_POST['Notes'], $_SESSION['ID']]);
    $_POST['AppType'] = "";
    header("Location: manure.php");
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
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'fertapps.php';}">Add Fertilizer</a><a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'manure.php';}">Add Manure</a>
  <div class="indented">
    <a onclick="toggle()" href="#Add">Add Manure</a>
</div>
  <img src="https://upgradeag.com/CIG/img/LogoNutrientStar.png" />
  <img src="https://upgradeag.com/CIG/img/logoamplify.png" />
</nav><br /><div class="main"><h1><?php
session_start();
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
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
?></h1><table><tr><th>Manure</th><th>AppType</th><th>Time</th><th>Availability</th><th>AppTiming</th><th>AmountPerAcre</th><th>Solid/Liquid</th><th>NPK</th><th>Notes</th></tr>
  <?php
  session_start();
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Pass";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'SELECT * FROM manure WHERE FieldID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);}
else {
  $sql = 'SELECT * FROM manure WHERE FieldID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);}
  if (count($arr)>0) {
  foreach ($arr as $i=>$val) {
    echo '<tr onclick="edit('.$val[0].')">';
    foreach ($val as $key => $value) {
      if ($key > 1 && $key != 3 && $key != 6 && $key != 8 && $key != 11) {
      echo '<td>'.$value.'</td>';
    }
    elseif ($key == 8) {
      if ($value == 0) {echo '<td>Solid</td>';}
      elseif ($value == 1) {echo '<td>Liquid</td>';}
    else {echo '<td></td>';}
    }
    elseif ($key == 3) {
      if ($value == 0) {echo '<td>Surface Applied</td>';}
      elseif ($value == 1) {echo '<td>Incorporated</td>';}
      elseif ($value == 2) {echo '<td>Injected</td>';}
    else {echo '<td></td>';}
    }
    elseif ($key == 6) {
      if ($value == 0) {echo '<td>Fall</td>';}
      elseif ($value == 1) {echo '<td>Spring</td>';}
      elseif ($value == 2) {echo '<td>Both</td>';}
    else {echo '<td></td>';}
    }
    }
    echo '</tr>';
  }
  }
  $_POST['NPK'];
  ?></table><br><div id="Add" class="newspaper"><br />
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Manure:<select name="Manure1" onchange="setManure()" id="Box"><option name="Manure1" value=""></option><option  name="Manure1" id="Manure1" value="Swine">Swine</option><option name="Manure1" id="Manure2" value="Beef">Beef</option><option type="radio" name="Manure1" id="Manure3" value="Dairy"><label for="Manure3">Dairy</label></option><option type="radio" name="Manure1" id="Manure4" value="Layer"><label for="Manure4">Layer</label></option><option type="radio" name="Manure1" id="Manure5" value="Broiler"><label for="Manure5">Broiler</label></option><option type="radio" name="Manure1" id="Manure6" value="Turkey"><label for="Manure6">Turkey</label></option><option type="radio" name="Manure1" id="Manure7" value="Layer Pullet"><label for="Manure7">Layer Pullet</label></option></select>
    <br /><input type="text" id="Manure" name="Manure"></input><br />
    App Type:<select name="AppType"><option value="10"></option><option type="radio" name="AppType" id="App1" value="0"><label for="App1">Surface Applied</label></option><option type="radio" name="AppType" id="App2" value="1"><label for="App2">Incorporated</label></option><option type="radio" id="App3" name="AppType" value="2"><label for="App3">Injected</label></option></select>
    <br />Time:<input type="time" name="Time"></input>
    Availability:<input type="text" name="Availability"></input><br />
    App Timing:<select name="AppTiming"><option value="10"></option><option type="radio" name="AppTiming" id="AppT1" value="0"><label for="AppT1">Fall</label></option><option type="radio" name="AppTiming" id="AppT2" value="1"><label for="AppT2">Spring</label></option><option type="radio" id="AppT3" name="AppTiming" value="2"><label for="AppT3">Both</label></option></select>
    <br />Gallons or Tons of Manure Per Acre:<input type="number" name="AmountPerAcre"></input>
    <br /><select><option value="10"></option><option type="radio" name="StateOfMatter" id="SoM1" value="0"><label for="SoM1">Solid</label></option><option type="radio" name="StateOfMatter" id="SoM2" value="1"><label for="SoM2">Liquid</label></option></select>
    <br />NPK:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" name="NPK"></input><br />
    Notes:<input type="text" name="Notes"></input>
    <input type="submit"></input>
  </form></div></div>

<script>
function stop(y) {
  var x = document.getElementById("Manure");
  x.value = y;
}
function edit(x) {
  document.cookie="PrimeIDManure=" + x;
  location.href = "editManure.php";
}
function setManure(x) {
  var form = document.getElementById("Manure");
  var box = document.getElementById("Box");
  var selected = box.options[box.selectedIndex];
  form.value = selected.value;
}
function toggle() {
  var x = document.getElementById("Add");
    if(x.style.display=="inline-block") {
      x.style.display="none";
    }
    else if(x.style.display=="none" || x.style.display=="") {
      x.style.display="inline-block";
    }
  }
</script>
</body>
</html>
