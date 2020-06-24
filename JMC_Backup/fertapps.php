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
    if ($_POST['FallN'] != "") {
    $sql = 'INSERT INTO fertilizerapps (FieldID, VariableRate, FallN, FallOther, FallLbs, FallInc, PreN, PreOther, PreLbs, PreInc, PreEmergeN, PreEmergeOther, PreEmergeLbs, PreEmergeInc, StarterNPK, SidedressN, SidedressInc, SidedressNFarmer, SidedressNFarmerInc, SidedressN75, SidedressN75Inc, StabilizerUsed, StabilizerProduct, LbsNfromUAN, Notes, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDField'], $_POST['VariableRate'],$_POST['FallN'],$_POST['FallOther'],$_POST['FallLbs'],$_POST['FallInc'],$_POST['PreN'],$_POST['PreOther'],$_POST['PreLbs'],$_POST['PreInc'],$_POST['PreEmergeN'],$_POST['PreEmergeOther'],
    $_POST['PreEmergeLbs'],$_POST['PreEmergeInc'],$_POST['StarterNPK'],$_POST['SidedressN'],$_POST['SidedressInc'],$_POST['SidedressNFarmer'],$_POST['SidedressNFarmerInc'],$_POST['SidedressN75'],$_POST['SidedressN75Inc'],$_POST['StabilizerUsed'],$_POST['StabilizerProduct'],$_POST['LbsNfromUAN'],$_POST['Notes'], $_SESSION['ID']]);
    $_POST['FallN'] = "";
    header("Location: fertapps.php");
    }
?>
  <html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="http://upgradeag.com/CIG/img/favicon.ico">
  <style>
    #Add {
      display: none;
    }
  </style>
</head>
<body><h1>
<?php
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
?></h1><nav>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a></nav>
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
  $sql = 'SELECT * FROM fertilizerapps WHERE FieldID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  if (count($arr)>0) {
    echo '<table><tr><th>Recieved Variable Rate N, P, K?</th><th>Fall N</th><th>Fall Other</th><th>Fall Lbs</th><th>Fall Incorporated</th><th>Preplant N</th><th>Preplant Other</th><th>Preplant Lbs</th><th>Preplant Incorporated</th><th>Pre-emerge N</th><th>Preplant Other</th><th>Preplant Lbs</th><th>Preplant Incorporated</th><th>Starter</th><th>Starter Rate</th><th>Sidedress N</th><th>Sidedress Inc</th><th>Sidedress NFarmer</th><th>SidedressNFarmerInc</th><th>Sidedress N75</th><th>SidedressN75Inc</th><th>Was Stabilizer Used?</th><th>Stabilizer Product?</th><th>Lbs From Uan</th><th>Notes</th></tr>';
  foreach ($arr as $i=>$val) {
    echo '<tr onclick="edit('.$val[0].')">';
    foreach ($val as $key => $value) {
      if ($key > 1 && $key !=2 && $key !=6 && $key !=10 && $key !=14 && $key !=18 && $key !=20 && $key !=21 && $key != 23 && $key != 27) {
      echo '<td>'.$value.'</td>';
    }
    elseif ($key == 2) {
      if ($value == 0) {echo '<td>Yes</td>';}
      if ($value == 1) {echo '<td>No</td>';}
    }
    elseif ($key == 6) {
      if ($value == 0) {echo '<td>No</td>';}
      if ($value == 1) {echo '<td>Incorporated</td>';}
      if ($value == 2) {echo '<td>Dribble</td>';}
    }
    elseif ($key == 10) {
      if ($value == 0) {echo '<td>No</td>';}
      if ($value == 1) {echo '<td>Incorporated</td>';}
      if ($value == 2) {echo '<td>Dribble</td>';}
    }
    elseif ($key == 14) {
      if ($value == 0) {echo '<td>No</td>';}
      if ($value == 1) {echo '<td>Incorporated</td>';}
      if ($value == 2) {echo '<td>Dribble</td>';}
    }
    elseif ($key == 18) {
      if ($value == 0) {echo '<td>No</td>';}
      if ($value == 1) {echo '<td>Incorporated</td>';}
      if ($value == 2) {echo '<td>Dribble</td>';}
    }
    elseif ($key == 20) {
      if ($value == 0) {echo '<td>No</td>';}
      if ($value == 1) {echo '<td>Incorporated</td>';}
      if ($value == 2) {echo '<td>Dribble</td>';}
    }
    elseif ($key == 21) {
      if ($value == 0) {echo '<td>No</td>';}
      if ($value == 1) {echo '<td>Incorporated</td>';}
      if ($value == 2) {echo '<td>Dribble</td>';}
    }
    elseif ($key == 23) {
      if ($value == 0) {echo '<td>Yes</td>';}
      if ($value == 1) {echo '<td>No</td>';}
    }
    }
    echo '</tr>';
  }
  echo '</table>';
  }
  ?><button onclick="toggle()">Add Fertilizer</button><div id="Add" class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <br />Recieved Variable Rate N, P, K?:<input type="radio" name="VariableRate" id="RVR1" value="0"><label for="RVR1">Yes</label></input><input type="radio" name="VariableRate" id="RVR2" value="1"><label for="RVR2">No</label></input>
    <br />Fall N:<input type="number" name="FallN"></input>
    Fall Other:<input type="number" name="FallOther"></input>
    Fall Lbs:<input type="number" name="FallLbs"></input><br />
    Fall Incorporated:<input type="radio" name="FallInc" id="FI1" value="0"><label for="FI1">Yes</label></input><input type="radio" name="FallInc" id="FI2" value="1"><label for="FI2">No</label></input>
    <br />Preplant N:<input type="number" name="PreN"></input>
    Preplant Other:<input type="number" name="PreOther"></input>
    Preplant Lbs:<input type="number" name="PreLbs"></input><br />
    Preplant Incorporated:<input type="radio" name="PreInc" id="PI1" value="0"><label for="PI1">No</label></input><input type="radio" id="PI2" name="PreInc" value="1"><label for="PI2">Incorporated</label></input><input type="radio" id="PI3" name="PreInc" value="2"><label for="PI3">Dribble</label></input>
    <br />Pre-emerge N:<input type="number" name="PreEmergeN"></input>
    Preplant Other:<input type="number" name="PreEmergeOther"></input>
    Preplant Lbs:<input type="number" name="PreEmergeLbs"></input>
    <br />Preplant Incorporated:<input type="radio" name="PreEmergeInc" id="PE1" value="0"><label for="PE1">No</label></input><input type="radio" name="PreEmergeInc" id="PE2" value="1"><label for="PE2">Incorporated</label></input><input type="radio" name="PreEmergeInc" id="PE3" value="2"><label for="PE3">Dribble</label></input>
    <br />Starter:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" name="StarterNPK"></input>
    Starter Rate:<input type="number" name="StarterRate"></input>
    Sidedress N:<input type="number" name="SidedressN"></input>
    <br />Sidedress Inc:<input type="radio" name="SidedressInc" id="SI1" value="0"><label for="SI1">No</label></input><input type="radio" name="SidedressInc" id="SI2" value="1"><label for="SI2">Incorporated</label></input><input type="radio" name="SidedressInc" id="SI3" value="2"><label for="SI3">Dribble</label></input>
    <br />Sidedress NFarmer:<input type="number" name="SidedressNFarmer"></input>
    <br />SidedressNFarmerInc:<input type="radio" name="SidedressNFarmerInc" id="SN1" value="0"><label for="SN1">No</label></input><input type="radio" name="SidedressNFarmerInc" id="SN2" value="1"><label for="SN2">Incorporated</label></input><input type="radio" name="SidedressNFarmerInc" id="SN3" value="2"><label for="SN3">Dribble</label></input>
    <br />Sidedress N75:<input type="number" name="SidedressN75"></input>
    <br />SidedressN75Inc:<input type="radio" name="SidedressN75Inc" id="SN751" value="0"><label for="SN751">No</label></input><input type="radio" name="SidedressN75Inc" id="SN752" value="1"><label for="SN752">Incorporated</label></input><input type="radio" name="SidedressN75Inc" id="SN753" value="2"><label for="SN753">Dribble</label></input>
    <br />Was Stabilizer Used?:<input type="radio" name="StabilizerUsed" id="SU1" value="0"><label for="SU1">Yes</label></input><input type="radio" name="StabilizerUsed" id="SU2" value="1"><label for="SU2">No</label></input>
    <br />Stabilizer Product?:<input type="text" name="StabilizerProduct"></input>
    Pounds with UAN from Irrigation:<input type="number" name="LbsNfromUAN"></input>
    Notes:<input type="text" name="Notes"></input>
    <input type="submit"></input>
  </form></div>

<script>
var txtBox = document.getElementsByTagName("input");
//alert(forms[0]); This is hhow you show a popup alert box
for (var i = 0; i < txtBox.length; i++) {
  txtBox[i].placeholder = txtBox[i].name.replace(/\B(?<![A-Z])[A-Z]/g, " $&");
}
function edit(x) {
  document.cookie="PrimeIDFert=" + x;
  location.href = "editfertapps.php";
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
