<html>
<head>
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>Username:<p>
    <input name = "username"/>
  <p>Password:<p>
    <input name = "password" type="password"/><br/>
  <input type="submit"/>
  </form>
  <?php
  session_start();
  $dbName = "C:/wamp64/www/OFRK-Program_Brendan.mdb";
  try {
  if (!file_exists($dbName)) {
      //die("Could not find database file.");
  }
  $connection = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ="C:/wamp64/www/OFRK-Program_Brendan.mdb"; Uid=""; Pwd="";");;}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
try{
  $username = $_REQUEST["username"];
  $password = $_REQUEST["password"];
  $sql = "SELECT ID FROM customers WHERE username = ? AND pword = ?;";
  $statement = $connection->prepare($sql);
  $statement->execute([$username, $password]);
  $arr = $statement->fetch(PDO::FETCH_NUM);
if(!$arr) exit("<a>Register</a>");
  $_SESSION['ID'] = $arr[0];
  $connection = null;
  header("Location: Data.php");
}
catch(Exception $e){echo "fail";}
  ?>
</body>
</html>
