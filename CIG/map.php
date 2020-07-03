</html>
   <head>
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
    <style>
        body {
            margin: 0px;
        }
    </style>
    </head>
    <body>
  <nav class="sidenav">
  <a class="sidenavmain" style = "margin-top: 10px;" href="other.php">Grower</a>
    <div class="indented"><a onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'edit.php';}">Edit Grower</a><br>
    <a onclick="toggle()">Add Grower</a>
  </div>
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a>
  <img src="https://upgradeag.com/CIG/img/LogoNutrientStar.jpg" />
  <img src="https://upgradeag.com/CIG/img/logoamplify.jpg" />
</nav>
        <div id='map' class="main" style='width: 100%; height: 100%;'></div>
        <script>
<?php
session_start();
if (!isset($_SESSION['ID'])) {
  header("Location: otherlogin.php");
}
$server = "localhost";
$uname = "upgrado3_client";
$pword = "Pass";
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
$sql = "SELECT Token, Style, Longitude, Latitude FROM field WHERE ID = ?";
$statement = $connection->prepare($sql);
$statement->execute([$_COOKIE['PrimeIDField']]);}
else {
$sql = "SELECT Token, Style, Longitude, Latitude FROM field WHERE ID = ? AND UserID = ?";
$statement = $connection->prepare($sql);
$statement->execute([$_COOKIE['PrimeIDField'], $_SESSION['ID']]);}
$arr = $statement->fetch(PDO::FETCH_NUM);
        echo '
        mapboxgl.accessToken = "'.$arr[0].'";
        var map = new mapboxgl.Map({
            container: "map",
            interactive: true,
            style: "'.$arr[1].'", // stylesheet location
            center: ['.$arr[2].','.$arr[3].'], // starting position [lng, lat]
            zoom: 15 // starting zoom
        });';?>
map.addControl(new mapboxgl.NavigationControl());
        </script></body>
</html>
