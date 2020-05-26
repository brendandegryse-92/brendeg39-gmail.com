<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Recieved Variable Rate N, P, K?:<input type="radio" name="VariableRate" value="0">Yes</input><input type="radio" name="VariableRate" value="1">No</input>
    Fall N:<input type="number" name="FallN"></input>
    Fall Other:<input type="number" name="FallOther"></input>
    Fall Lbs:<input type="number" name="FallLbs"></input>
    Fall Incorporated:<input type="radio" name="FallInc" value="0">Yes</input><input type="radio" name="FallInc" value="1">No</input>
    Preplant N:<input type="number" name="PreN"></input>
    Preplant Other:<input type="number" name="PreOther"></input>
    Preplant Lbs:<input type="number" name="PreLbs"></input>
    Preplant Incorporated:<input type="radio" name="PreInc" value="0">No</input><input type="radio" name="PreInc" value="1">Incorporated</input><input type="radio" name="PreInc" value="2">Dribble</input>
    Pre-emerge N:<input type="number" name="PreEmergeN"></input>
    Preplant Other:<input type="number" name="PreEmergeOther"></input>
    Preplant Lbs:<input type="number" name="PreEmergeLbs"></input>
    Preplant Incorporated:<input type="radio" name="PreEmergeInc" value="0">No</input><input type="radio" name="PreEmergeInc" value="1">Incorporated</input><input type="radio" name="PreEmergeInc" value="2">Dribble</input>
    Starter:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" name="StarterNPK"></input>
    Starter Rate:<input type="number" name="StarterRate"></input>
    Sidedress N:<input type="number" name="SidedressN"></input>
    Sidedress Inc:<input type="radio" name="SidedressInc" value="0">No</input><input type="radio" name="SidedressInc" value="1">Incorporated</input><input type="radio" name="SidedressInc" value="2">Dribble</input>
    Sidedress NFarmer:<input type="number" name="SidedressNFarmer"></input>
    SidedressNFarmerInc:<input type="radio" name="SidedressNFarmerInc" value="0">No</input><input type="radio" name="SidedressNFarmerInc" value="1">Incorporated</input><input type="radio" name="SidedressNFarmerInc" value="2">Dribble</input>
    Sidedress N75:<input type="number" name="SidedressN75"></input>
    SidedressN75Inc:<input type="radio" name="SidedressN75Inc" value="0">No</input><input type="radio" name="SidedressN75Inc" value="1">Incorporated</input><input type="radio" name="SidedressN75Inc" value="2">Dribble</input>
    Was Stabilizer Used?:<input type="radio" name="StabilizerUsed" value="0">Yes</input><input type="radio" name="StabilizerUsed" value="1">No</input>
    Stabilizer Product?:<input type="text" name="StabilizerProduct"></input>
    Lbs From Uan:<input type="number" name="LbsNfromUAN"></input>
    <input type="submit"></input>
  </form>
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
$sql = 'SELECT * FROM fertilizerapps WHERE FieldID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr)>0) {
  echo '<table><tr><th>Recieved Variable Rate N, P, K?</th><th>Fall N</th><th>Fall Other</th><th>Fall Lbs</th><th>Fall Incorporated</th><th>Preplant N</th><th>Preplant Other</th><th>Preplant Lbs</th><th>Preplant Incorporated</th><th>Pre-emerge N</th><th>Preplant Other</th><th>Preplant Lbs</th><th>Preplant Incorporated</th><th>Starter</th><th>Starter Rate</th><th>Sidedress N</th><th>Sidedress Inc</th><th>Sidedress NFarmer</th><th>SidedressNFarmerInc</th><th>Sidedress N75</th><th>SidedressN75Inc</th><th>Was Stabilizer Used?</th><th>Stabilizer Product?</th><th>Lbs From Uan</th></tr>';
foreach ($arr as $i=>$val) {
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 1 && $key !=2 && $key !=6 && $key !=10 && $key !=14 && $key !=18 && $key !=20 && $key !=21 && $key != 23) {
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
}
  if ($_POST['FallN'] != "") {
  $sql = 'INSERT INTO fertilizerapps (FieldID, VariableRate, FallN, FallOther, FallLbs, FallInc, PreN, PreOther, PreLbs, PreInc, PreEmergeN, PreEmergeOther, PreEmergeLbs, PreEmergeInc, StarterNPK, SidedressN, SidedressInc, SidedressNFarmer, SidedressNFarmerInc, SidedressN75, SidedressN75Inc, StabilizerUsed, StabilizerProduct, LbsNfromUAN) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDField'], $_POST['VariableRate'],$_POST['FallN'],$_POST['FallOther'],$_POST['FallLbs'],$_POST['FallInc'],$_POST['PreN'],$_POST['PreOther'],$_POST['PreLbs'],$_POST['PreInc'],$_POST['PreEmergeN'],$_POST['PreEmergeOther'],
  $_POST['PreEmergeLbs'],$_POST['PreEmergeInc'],$_POST['StarterNPK'],$_POST['SidedressN'],$_POST['SidedressInc'],$_POST['SidedressNFarmer'],$_POST['SidedressNFarmerInc'],$_POST['SidedressN75'],$_POST['SidedressN75Inc'],$_POST['StabilizerUsed'],$_POST['StabilizerProduct'],$_POST['LbsNfromUAN']]);
  $_POST['FallN'] = "";
  header("Location: fertapps.php");
  }
?>
<script>
function edit(x) {
  document.cookie="PrimeIDFert=" + x;
  location.href = "editfertapps.php";
}
</script>
</body>
</html>
