<html>
<head>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name:<input type="text"></input>
    Middle Initial:<input type="text"></input>
    Last Name:<input type="text"></input>
    Company Name:<input type="text"></input>
    Mailing Address:<input type="text"></input>
    City:<input type="text"></input>
    State:<input type="text"></input>
    ZIP:<input type="number"></input>
    Home Phone:<input type="phone"></input>
    Mobile Phone:<input type="phone"></input>
    Email:<input type="email"></input>
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
?>
</body>
</html>
