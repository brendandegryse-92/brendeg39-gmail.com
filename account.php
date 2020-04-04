<html>
<title>Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
<h2>Need Help?</h2>
<h3>Phone: <a href="tel:419-212-0479">(419) 212-0479</a></h3>
<h3>Email: <a href="mailto:mcguire9@gmail.com"> mcguire9@gmail.com</a></h3><script type="text/javascript" src="headjs.js"></script>
<?php
session_start();
$server = "localhost";
$uname = "client";
$pword = "Pass";
try {
$connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
$sql = "SELECT ExpireDate FROM users WHERE UserID = ?";
$statement = $connection->prepare($sql);
$statement->execute([$_SESSION['ID']]);
$arr = $statement->fetch(PDO::FETCH_NUM);
echo '<h3>Account expires on '.$arr[0].'</h3>';
?>
<script>
var x = "accountelem";
document.getElementById(x).className += " activeNav";
</script>
</body>
</HTML>
