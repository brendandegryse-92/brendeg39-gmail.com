<html>
<head>
</head>
<body>
  <a href="#field.php">Field</a>
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
$sql = 'SELECT FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower WHERE ID = 48';
$stmt = $connection->prepare($sql);
$stmt->execute([$_COOKIE['PrimeID']]);
$arr = $stmt->fetch(PDO::FETCH_NUM);
echo '
  First Name:<input type="text" value="'.$arr[0].'" name="FirstName"></input>
  Middle Initial:<input type="text" value="'.$arr[1].'" name="MI"></input>
  Last Name:<input type="text" value="'.$arr[2].'" name="LastName"></input>
  Company Name:<input type="text" value="'.$arr[3].'" name="CompanyName"></input>
  Mailing Address:<input type="text" value="'.$arr[4].'" name="MailAdd"></input>
  City:<input type="text" value="'.$arr[5].'" name="City"></input>
  State:<input type="text" value="'.$arr[6].'" name="State"></input>
  ZIP:<input type="number" value="'.$arr[7].'" name="ZIP"></input>
  Home Phone:<input type="phone" value="'.$arr[8].'" name="Home"></input>
  Mobile Phone:<input type="phone" value="'.$arr[9].'" name="Mobile"></input>
  Email:<input type="email" value="'.$arr[10].'" name="Email"></input>
  <input type="submit"></input>
</form>';
  if (isset($_POST['FirstName'])) {
  $sql = 'UPDATE grower SET FirstName = ?, MI = ?, LastName = ?, CompanyName = ?, MailingAddress = ?, City = ?, State = ?, Zip = ?, HomePhone = ?, MobilePhone = ?, Email = ? WHERE ID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_COOKIE['PrimeID']]);
  header("Location: other.php");
  }
?>
<script>
</script>
</body>
</html>
