<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Recieved Variable Rate N, P, K?:<input type="checkbox" name="VariableRate"></input>
    Fall N:<input type="text" name="MI"></input>
    Proplant N:<input type="text" name="LastName"></input>
    Pre-emerge N:<input type="text" name="CompanyName"></input>
    Starter:<input type="text" pattern="\d{1,2}%\d{1,2}%\d{1,2}%" placeholder="--%--%--%" name="MailAdd"></input>
    Sidedress N:<input type="text" name="City"></input>
    State:<input type="text" name="State"></input>
    ZIP:<input type="number" name="ZIP"></input>
    Home Phone:<input type="phone" name="Home"></input>
    Mobile Phone:<input type="phone" name="Mobile"></input>
    Email:<input type="email" name="Email"></input>
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
$sql = 'SELECT ID, FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower';
$stmt = $connection->prepare($sql);
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if (count($arr)>0) {
  echo '<table><tr><th>First Name</th><th>MI</th><th>Last Name</th><th>Company Name</th><th>Mailing Address</th><th>City</th><th>State</th><th>ZIP</th><th>Home Phone</th><th>Mobile Phone</th><th>Email</th></tr>';
foreach ($arr as $i=>$val) {
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 0) {
    echo '<td>'.$value.'</td>';
  }
  }
  echo '</tr>';
}
}
  if ($_POST['VariableRate'] != "") {
  $sql = 'INSERT INTO grower (FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email']]);
  $_POST['VariabelRate'] = "";
  header("Location: fertapps.php");
  }
?>
<script>
function edit(x) {
  document.cookie="PrimeIDGrower=" + x;
  location.href = "edit.php";
}
</script>
</body>
</html>
