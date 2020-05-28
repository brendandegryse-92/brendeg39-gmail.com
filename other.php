<html>
<style media="screen">

  body {
  	background-color: lightgray;
  }
  .newspaper {
  column-count: 4;
  }
  nav{
    margin-top: 20px;
  }
  Div{
    margin-top: 25px;
    margin-bottom: 50px;
  }
  a{
    margin-left: 10px;
  }
  input {
    width: 100%;
    padding: 8px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type=Submit], select {
    color: #ffffff;
    background-color: #99ccff;
  }
  input[type=submit]:hover {
    background-color: #45a049;
  }
  table{
    background-color: white;
  }
  th{
    background-color: lightgray;
    border: 1px solid black;
    margin: 8px;
  }
  tr{
    background-color: lightblue;
    border: 1px dotted black;
    border-style:dotted;
  }
</style>
<head>
</head>
<body>
  <nav>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a> <a href="otherlogin.php">Login</a> <a href="otherregister.php">Register</a>
  </nav>
<div class="newspaper">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="FirstName" placeholder="First Name"></input>
    <input type="text" name="MI" placeholder="Middle Initial"></input>
    <input type="text" name="LastName" placeholder="Last Name"></input>
    <input type="text" name="CompanyName" placeholder="Company Name"></input>
    <input type="text" name="MailAdd" placeholder="Street"></input>
    <input type="text" name="City" placeholder="City"></input>
    <input type="text" name="State" placeholder="State"></input>
    <input type="number" name="ZIP" placeholder="Zip"></input>
    <input type="phone" name="Home" placeholder="Home Phone"></input>
    <input type="phone" name="Mobile" placeholder="Mobile Phone"></input>
    <input type="email" name="Email" placeholder="Email"></input>
    <input type="submit"></input>
  </form>
</div>
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
$sql = 'SELECT ID, FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower WHERE UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
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
  if ($_POST['FirstName'] != "") {
  $sql = 'INSERT INTO grower (FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_SESSION['ID']]);
  $_POST['FirstName'] = "";
  header("Location: other.php");
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
