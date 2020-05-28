<html>
<head>
</head>
<body><h1><?php
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
$sql = 'SELECT FieldName FROM field WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
echo $arr[0][0];
?></h1>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
$sql = 'SELECT * FROM fertilizerapps WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDFert'], $_SESSION['ID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
  Recieved Variable Rate N, P, K?:<input type="radio" id="RVR1" name="VariableRate" value="0"'; if ($arr[2] == 0) {echo ' checked';} echo '><label for="RVR1">Yes</label></input><input type="radio" name="VariableRate" id="RVR2" value="1"'; if ($arr[2] == 1) {echo ' checked';} echo '><label for="RVR2">No</label></input>
  Fall N:<input type="number"  value="'.$arr[3].'" name="FallN"></input>
  Fall Other:<input type="number"  value="'.$arr[4].'" name="FallOther"></input>
  Fall Lbs:<input type="number"  value="'.$arr[5].'" name="FallLbs"></input>
  Fall Incorporated:<input type="radio" name="FallInc" id="FI1" value="0"'; if ($arr[6] == 0) {echo ' checked';} echo '><label for="FI1">Yes</label></input><input type="radio" name="FallInc" id="FI2" value="1"'; if ($arr[6] == 1) {echo ' checked';} echo '><label for="FI2">No</label></input>
  Preplant N:<input type="number"  value="'.$arr[7].'" name="PreN"></input>
  Preplant Other:<input type="number"  value="'.$arr[8].'" name="PreOther"></input>
  Preplant Lbs:<input type="number"  value="'.$arr[9].'" name="PreLbs"></input>
  Preplant Incorporated:<input type="radio" name="PreInc" id="PI1" value="0"'; if ($arr[10] == 0) {echo ' checked';} echo '><label for="PI1">No</label></input><input type="radio" name="PreInc" id="PI2" value="1"'; if ($arr[10] == 1) {echo ' checked';} echo '><label for="PI2">Incorporated</label></input><input type="radio" name="PreInc" id="PI3" value="2"'; if ($arr[10] == 2) {echo ' checked';} echo '><label for="PI3">Dribble</label></input>
  Pre-emerge N:<input type="number"  value="'.$arr[11].'" name="PreEmergeN"></input>
  Preplant Other:<input type="number"  value="'.$arr[12].'" name="PreEmergeOther"></input>
  Preplant Lbs:<input type="number"  value="'.$arr[13].'" name="PreEmergeLbs"></input>
  Preplant Incorporated:<input type="radio" name="PreEmergeInc" id="PE1" value="0"'; if ($arr[14] == 0) {echo ' checked';} echo '><label for="PE1">No</label></input><input type="radio" id="PE2" name="PreEmergeInc" value="1"'; if ($arr[14] == 1) {echo ' checked';} echo '><label for="PE2">Incorporated</label></input><input type="radio" id="PE3" name="PreEmergeInc" value="2"'; if ($arr[14] == 2) {echo ' checked';} echo '><label for="PE3">Dribble</label></input>
  Starter:<input type="text" pattern="(\d{1,2}%\d{1,2}%\d{1,2}%)|\d" placeholder="--%--%--%"  value="'.$arr[15].'" name="StarterNPK"></input>
  Starter Rate:<input type="number"  value="'.$arr[16].'" name="StarterRate"></input>
  Sidedress N:<input type="number"  value="'.$arr[17].'" name="SidedressN"></input>
  Sidedress Inc:<input type="radio" name="SidedressInc" id="SI1" value="0"'; if ($arr[18] == 0) {echo ' checked';} echo '><label for="SI1">No</label></input><input type="radio" name="SidedressInc" id="SI2" value="1"'; if ($arr[18] == 1) {echo ' checked';} echo '><label for="SI2">Incorporated</label></input><input type="radio" name="SidedressInc" id="SI3" value="2"'; if ($arr[18] == 2) {echo ' checked';} echo '><label for="SI3">Dribble</label></input>
  Sidedress NFarmer:<input type="number"  value="'.$arr[19].'" name="SidedressNFarmer"></input>
  SidedressNFarmerInc:<input type="radio" name="SidedressNFarmerInc" id="SN1" value="0"'; if ($arr[20] == 0) {echo ' checked';} echo '><label for="SN1">No</label></input><input type="radio" name="SidedressNFarmerInc" id="SN2" value="1"'; if ($arr[20] == 1) {echo ' checked';} echo '><label for="SN2">Incorporated</label></input><input type="radio" name="SidedressNFarmerInc" id="SN3" value="2"'; if ($arr[20] == 2) {echo ' checked';} echo '><label for="SN3">Dribble</label></input>
  Sidedress N75:<input type="number"  value="'.$arr[21].'" name="SidedressN75"></input>
  SidedressN75Inc:<input type="radio" name="SidedressN75Inc" id="SN751" value="0"'; if ($arr[22] == 0) {echo ' checked';} echo '><label for="SN751">No</label></input><input type="radio" name="SidedressN75Inc" id="SN752" value="1"'; if ($arr[22] == 1) {echo ' checked';} echo '><label for="SN752">Incorporated</label></input><input type="radio" name="SidedressN75Inc" id="SN753" value="2"'; if ($arr[22] == 2) {echo ' checked';} echo '><label for="SN753">Dribble</label></input>
  Was Stabilizer Used?:<input type="radio" name="StabilizerUsed" id="SU1" value="0"'; if ($arr[23] == 0) {echo ' checked';} echo '><label for="SU1">Yes</label></input><input type="radio" name="StabilizerUsed" id="SU2" value="1"'; if ($arr[23] == 1) {echo ' checked';} echo '><label for="SU2">No</label></input>
  Stabilizer Product?:<input type="text"  value="'.$arr[24].'" name="StabilizerProduct"></input>
  Lbs From Uan:<input type="number"  value="'.$arr[25].'" name="LbsNfromUAN"></input>
    <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
  </form>';
  if (isset($_POST['FallN'])) {
  if ($_POST['delete'] == "on") {
    $sql = "DELETE FROM fertilizerapps WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDFert'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: fertapps.php");
  }
  else {
  $sql = 'UPDATE fertilizerapps SET VariableRate = ?, FallN = ?, FallOther = ?, FallLbs = ?, FallInc = ?, PreN = ?, PreOther = ?, PreLbs = ?, PreInc = ?, PreEmergeN = ?, PreEmergeOther = ?, PreEmergeLbs = ?, PreEmergeInc = ?, StarterNPK = ?, SidedressN = ?, SidedressInc = ?, SidedressNFarmer = ?, SidedressNFarmerInc = ?, SidedressN75 = ?, SidedressN75Inc = ?, StabilizerUsed = ?, StabilizerProduct = ?, LbsNfromUAN = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['VariableRate'],$_POST['FallN'],$_POST['FallOther'],$_POST['FallLbs'],$_POST['FallInc'],$_POST['PreN'],$_POST['PreOther'],$_POST['PreLbs'],$_POST['PreInc'],$_POST['PreEmergeN'],$_POST['PreEmergeOther'],
  $_POST['PreEmergeLbs'],$_POST['PreEmergeInc'],$_POST['StarterNPK'],$_POST['SidedressN'],$_POST['SidedressInc'],$_POST['SidedressNFarmer'],$_POST['SidedressNFarmerInc'],$_POST['SidedressN75'],$_POST['SidedressN75Inc'],$_POST['StabilizerUsed'],$_POST['StabilizerProduct'],$_POST['LbsNfromUAN'], $_COOKIE['PrimeIDFert'], $_SESSION['ID']]);
  header("Location: fertapps.php");
  }
}
?>
<script>
</script>
</body>
</html>
