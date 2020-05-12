<html>
<head>
</head>
<body>
  <a href = "#field.php">Field</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name:<input type="text" name="FirstName"></input>
    Middle Initial:<input type="text" name="MI"></input>
    Last Name:<input type="text"name="LastName"></input>
    Company Name:<input type="text" name="CompanyName"></input>
    Mailing Address:<input type="text" name="MailAdd"></input>
    City:<input type="text" name="City"></input>
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
$sql = 'SELECT * FROM grower';
$stmt = $connection->prepare($sql);
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
foreach ($arr as $i=>$val) {
  array_push($_SESSION['rowPrimaryID'], $val[0]);
  foreach ($val as $key => $value) {
    echo $value;
  }
  echo '<br>';
  echo 'alert';
  if (isset($_POST['FirstName'])) {
  echo '<script>alert("sdlf");</script>';
  $sql = 'INSERT INTO grower (FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email']]);
  }
}
?>
</body>
</html>
