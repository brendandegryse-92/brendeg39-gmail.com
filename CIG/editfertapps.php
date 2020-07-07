</html>
sion_start();
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
  if (isset($_POST['FallN'])) {
  if ($_POST['delete'] == "on") {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
    $sql = "DELETE FROM fertilizerapps WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDFert']]);
    $_POST['delete'] == "off";
    header("Location: fertapps.php");}
  else {
    $sql = "DELETE FROM fertilizerapps WHERE ID = ? AND UserID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_COOKIE['PrimeIDFert'], $_SESSION['ID']]);
    $_POST['delete'] == "off";
    header("Location: fertapps.php");}
  }
  else {
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
  $sql = 'UPDATE fertilizerapps SET VariableRate = ?, FallN = ?, FallOther = ?, FallLbs = ?, FallInc = ?, PreN = ?, PreOther = ?, PreLbs = ?, PreInc = ?, PreEmergeN = ?, PreEmergeOther = ?, PreEmergeLbs = ?, PreEmergeInc = ?, StarterNPK = ?, SidedressN = ?, SidedressInc = ?, SidedressNFarmer = ?, SidedressNFarmerInc = ?, SidedressN75 = ?, SidedressN75Inc = ?, StabilizerUsed = ?, StabilizerProduct = ?, LbsNfromUAN = ?, Notes = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['VariableRate'],$_POST['FallN'],$_POST['FallOther'],$_POST['FallLbs'],$_POST['FallInc'],$_POST['PreN'],$_POST['PreOther'],$_POST['PreLbs'],$_POST['PreInc'],$_POST['PreEmergeN'],$_POST['PreEmergeOther'],
  $_POST['PreEmergeLbs'],$_POST['PreEmergeInc'],$_POST['StarterNPK'],$_POST['SidedressN'],$_POST['SidedressInc'],$_POST['SidedressNFarmer'],$_POST['SidedressNFarmerInc'],$_POST['SidedressN75'],$_POST['SidedressN75Inc'],$_POST['StabilizerUsed'],$_POST['StabilizerProduct'],$_POST['LbsNfromUAN'],$_POST['Notes'], $_COOKIE['PrimeIDFert']]);}
  else {
  $sql = 'UPDATE fertilizerapps SET VariableRate = ?, FallN = ?, FallOther = ?, FallLbs = ?, FallInc = ?, PreN = ?, PreOther = ?, PreLbs = ?, PreInc = ?, PreEmergeN = ?, PreEmergeOther = ?, PreEmergeLbs = ?, PreEmergeInc = ?, StarterNPK = ?, SidedressN = ?, SidedressInc = ?, SidedressNFarmer = ?, SidedressNFarmerInc = ?, SidedressN75 = ?, SidedressN75Inc = ?, StabilizerUsed = ?, StabilizerProduct = ?, LbsNfromUAN = ?, Notes = ? WHERE ID = ? AND UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['VariableRate'],$_POST['FallN'],$_POST['FallOther'],$_POST['FallLbs'],$_POST['FallInc'],$_POST['PreN'],$_POST['PreOther'],$_POST['PreLbs'],$_POST['PreInc'],$_POST['PreEmergeN'],$_POST['PreEmergeOther'],
  $_POST['PreEmergeLbs'],$_POST['PreEmergeInc'],$_POST['StarterNPK'],$_POST['SidedressN'],$_POST['SidedressInc'],$_POST['SidedressNFarmer'],$_POST['SidedressNFarmerInc'],$_POST['SidedressN75'],$_POST['SidedressN75Inc'],$_POST['StabilizerUsed'],$_POST['StabilizerProduct'],$_POST['LbsNfromUAN'],$_POST['Notes'], $_COOKIE['PrimeIDFert'], $_SESSION['ID']]);
  }
  header("Location: fertapps.php");
  }
}
?>
<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
</head>
<body>
  <nav class="sidenav">
  <a class="sidenavmain" style = "margin-top: 10px;" href="other.php">Grower</a>
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a>
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'fertapps.php';}">Add Fertilizer</a>
    <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDField')>=0) {location.href = 'manure.php';}">Add Manure</a><br />
</nav><br /><div class="main"><h1><?php
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
  <div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
  $sql = "SELECT AccountType FROM users WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  if ($stmt->fetch(PDO::FETCH_NUM)[0] == "Admin") {
$sql = 'SELECT * FROM fertilizerapps WHERE ID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDFert']]);}
else {
$sql = 'SELECT * FROM fertilizerapps WHERE ID = ? AND UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeIDFert'], $_SESSION['ID']]);
}
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
  Recieved Variable Rate N, P, K?:<select name="VariableRate"><option name="VariableRate" value="10"></option><option id="RVR1" name="VariableRate" value="0"'; if ($arr[2] == 0) {echo ' selected';} echo '>Yes</option><option name="VariableRate" id="RVR2" value="1"'; if ($arr[2] == 1) {echo ' selected';} echo '>No</option></select>
  Fall N:<input type="number"  value="'.$arr[3].'" name="FallN"></input><br />
  Fall Other:<input type="number"  value="'.$arr[4].'" name="FallOther"></input>
  Fall Lbs:<input type="number"  value="'.$arr[5].'" name="FallLbs"></input><br />
  Fall Incorporated:<select name="FallInc"><option name="FallInc" value="10"></option><option name="FallInc" id="FI1" value="0"'; if ($arr[6] == 0) {echo ' selected';} echo '>Yes</option><option name="FallInc" id="FI2" value="1"'; if ($arr[6] == 1) {echo ' selected';} echo '>No</option></select>
  <br />Preplant N:<input type="number"  value="'.$arr[7].'" name="PreN"></input>
  Preplant Other:<input type="number"  value="'.$arr[8].'" name="PreOther"></input>
  Preplant Lbs:<input type="number"  value="'.$arr[9].'" name="PreLbs"></input><br />
  Preplant Incorporated:<select name="PreInc"><option name="PreInc" value="10"></option><option name="PreInc" id="PI1" value="0"'; if ($arr[10] == 0) {echo ' selected';} echo '>No</option><option name="PreInc" id="PI2" value="1"'; if ($arr[10] == 1) {echo ' selected';} echo '>Incorporated</option><option name="PreInc" id="PI3" value="2"'; if ($arr[10] == 2) {echo ' selected';} echo '>Dribble</option></select>
  <br />Pre-emerge N:<input type="number"  value="'.$arr[11].'" name="PreEmergeN"></input>
  Preplant Other:<input type="number"  value="'.$arr[12].'" name="PreEmergeOther"></input>
  Preplant Lbs:<input type="number"  value="'.$arr[13].'" name="PreEmergeLbs"></input><br />
  Preplant Incorporated:<select name="PreEmergeInc"><option name="PreEmergeInc" value="10"></option><option name="PreEmergeInc" id="PE1" value="0"'; if ($arr[14] == 0) {echo ' selected';} echo '>No</option><option id="PE2" name="PreEmergeInc" value="1"'; if ($arr[14] == 1) {echo ' selected';} echo '>Incorporated</option><option id="PE3" name="PreEmergeInc" value="2"'; if ($arr[14] == 2) {echo ' selected';} echo '>Dribble</option></select>
  <br />Starter:<input type="text" pattern="(\d{1,2}%\d{1,2}%\d{1,2}%)|\d" placeholder="--%--%--%"  value="'.$arr[15].'" name="StarterNPK"></input><br />
  <br />Starter Rate:<input type="number"  value="'.$arr[16].'" name="StarterRate"></input>
  Sidedress N:<input type="number"  value="'.$arr[17].'" name="SidedressN"></input><br />
  Sidedress Inc:<select name="SideressInc"><option name="SideressInc" value="10"></option><option name="SidedressInc" id="SI1" value="0"'; if ($arr[18] == 0) {echo ' selected';} echo '>No</option><option name="SidedressInc" id="SI2" value="1"'; if ($arr[18] == 1) {echo ' selected';} echo '>Incorporated</option><option name="SidedressInc" id="SI3" value="2"'; if ($arr[18] == 2) {echo ' selected';} echo '>Dribble</option></select>
  <br />Sidedress NFarmer:<input type="number"  value="'.$arr[19].'" name="SidedressNFarmer"></input><br />
  <br />SidedressNFarmerInc:<select name="SidedressNFarmerInc"><option name="SidedressNFarmerInc" value="10"></option><option name="SidedressNFarmerInc" id="SN1" value="0"'; if ($arr[20] == 0) {echo ' selected';} echo '>No</option><option name="SidedressNFarmerInc" id="SN2" value="1"'; if ($arr[20] == 1) {echo ' selected';} echo '>Incorporated</option><option name="SidedressNFarmerInc" id="SN3" value="2"'; if ($arr[20] == 2) {echo ' selected';} echo '>Dribble</option></select>
  Sidedress N75:<input type="number"  value="'.$arr[21].'" name="SidedressN75"></input><br />
  SidedressN75Inc:<select name="SidedressN75Inc"><option name="SidedressN75Inc" value="10"></option><option name="SidedressN75Inc" id="SN751" value="0"'; if ($arr[22] == 0) {echo ' selected';} echo '>No</option><option name="SidedressN75Inc" id="SN752" value="1"'; if ($arr[22] == 1) {echo ' selected';} echo '>Incorporated</option><option name="SidedressN75Inc" id="SN753" value="2"'; if ($arr[22] == 2) {echo ' selected';} echo '>Dribble</option></select>
  <br />Was Stabilizer Used?:<select name="StabilizerUsed"><option name="StabilizerUsed" value="10"></option><option name="StabilizerUsed" id="SU1" value="0"'; if ($arr[23] == 0) {echo ' selected';} echo '>Yes</option><option name="StabilizerUsed" id="SU2" value="1"'; if ($arr[23] == 1) {echo ' selected';} echo '>No</option></select>
  <br />Stabilizer Product?:<input type="text"  value="'.$arr[24].'" name="StabilizerProduct"></input>
  Lbs From Uan:<input type="number"  value="'.$arr[25].'" name="LbsNfromUAN"></input>
  Notes:<input type="text"  value="'.$arr[26].'" name="Notes"></input>
    <input type="submit"></input><input type="checkbox" name="delete">Delete</input>
  </form></div></div>';
?>
<script>
</script>
</body>
</html>
