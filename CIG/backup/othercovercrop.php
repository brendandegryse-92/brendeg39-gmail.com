<?php
  session_start();
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
    if ($_POST['CoverCrop'] != "") {
    $sql = 'INSERT INTO covercrop (FieldID, CoverCrop, DateSeeded, How, Ncredits, HowKilled, DateKilled, Notes, UserID) VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_POST['CoverCrop'], $_POST['DateSeeded'], $_POST['HowSeeded'], $_POST['Ncredits'], $_POST['HowKilled'], $_POST['DateKilled'], $_POST['Notes'], $_SESSION['ID']]);
    $_POST['AppType'] = "";
    header("Location: othercovercrop.php");
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
<body><h1><?php
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
$sql = 'SELECT FieldName FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
echo $arr[0][0];
?></h1>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="othercovercrop.php">Cover Crop</a> <a href="fertapps.php">Fertilizer Applications</a><?php
  session_start();
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Passterm";
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
  $sql = 'SELECT * FROM covercrop WHERE FieldID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);}
else {
  $sql = 'SELECT * FROM covercrop WHERE FieldID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);}
  if (count($arr)>0) {
    echo '<table><tr><th>Cover Crop</th><th>Date Seeded</th><th>How</th><th>NCredits</th><th>How Killed</th><th>Date Killed</th><th>Notes</th></tr>';
  foreach ($arr as $i=>$val) {
    echo '<tr onclick="edit('.$val[0].')">';
    foreach ($val as $key => $value) {
      if ($key > 2){// && $key != 8 && $key != 11) {
      echo '<td>'.$value.'</td>';
    }
    elseif ($key == 8) {
      if ($value == 0) {echo '<td>Solid</td>';}
      if ($value == 1) {echo '<td>Liquid</td>';}
    }
    }
    echo '</tr>';
  }
  echo '</table>';
  }
  $_POST['NPK'];
  ?><br><button onclick="toggle()">Add Cover Crop</button><div id="Add" class="newspaper"><br />
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Cover Crop:<input type="text" name="CoverCrop"></input>
    Date Seeded:<input type="date" name="DateSeeded"></input>
    How Was It Seeded:<input type="text" name="HowSeeded"></input>
    Ncredits:<input type="number" name="Ncredits"></input><br />
    How Was It Killed:<input type="radio" name="HowKilled" id="How1" value="0"><label for="How1">Chemical burn down</label></input><input type="radio" name="HowKilled" id="How2" value="1"><label for="How2">Plowed or Disked under</label></input><input type="radio" name="HowKilled" id="How3" value="2"><label for="How3">Harvested</label></input><input type="radio" name="HowKilled" id="How4" value="3"><label for="How4">Other</label></input>
    <br />Date:<input type="date" name="DateKilled"></input>
    Number of years in the last 5 manure was applied:<input type="text" name="Last5"></input><br />
    Received manure 8 of last 10 years:<input type="radio" name="8of10" id="8of101" value="0"><label for="8of101">Yes</label></input><input type="radio" name="8of10" id="8of102" value="1"><label for="8of102">No</label></input><input type="radio" name="8of10" id="8of103" value="1"><label for="8of103">Don't Know</label></input>
    <br />
    Notes:<input type="text" name="Notes"></input><input type="submit"></input></div>
  </form></div>

<script>
function edit(x) {
  document.cookie="PrimeIDCover=" + x;
  location.href = "editCover.php";
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
