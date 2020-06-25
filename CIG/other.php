<?php
  session_start();
  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Pass";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
  if (!isset($_SESSION['ID'])) {
    header("Location: http://upgradeag.com/CIG/otherlogin.php");
  }
    if ($_POST['FirstName'] != "") {
    $sql = 'INSERT INTO grower (FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_SESSION['ID']]);
    $_POST['FirstName'] = "";
    header("Location: other.php");
    }
  ?>
<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
  <style>
    #Add {
      display: none;
    }
  </style>
</head>
<body>
  <nav class="sidenav">
  <a class="sidenavmain" style = "margin-top: 10px;" href="other.php">Grower</a>
    <div class="indented"><a onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'edit.php';}">Edit Grower</a><br />
    <a onclick="toggle()">Add Grower</a>
  </div>
  <a class="sidenavmain" onclick="if (document.cookie.search('PrimeIDGrower')>=0) {location.href = 'otherfield.php';}">Fields</a>
</nav>

<br />
  <div class="main">
    <h1>All growers for <?php
    $sql = 'SELECT Name FROM users WHERE ID = ?;';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_SESSION['ID']]);
    echo $stmt->fetch(PDO::FETCH_NUM)[0]; ?>:</h1>
  <?php
  session_start();
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
  $sql = 'SELECT ID, FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower';
  $stmt = $connection->prepare($sql);
  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);}
  else {
  $sql = 'SELECT ID, FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email FROM grower WHERE UserID = ?';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  }
  if (count($arr)>0) {
    echo '  <b><div class="active">Active Grower: <tag style="color: green;" id="Grower"></span></tag> </b>
    <table><tr><th>First Name</th><th>MI</th><th>Last Name</th><th>Company Name</th><th>Mailing Address</th><th>City</th><th>State</th><th>ZIP</th><th>Home Phone</th><th>Mobile Phone</th><th>Email</th></tr>';
  foreach ($arr as $i=>$val) {
    echo '<tr onclick="edit('.$val[0].',\''.addslashes($val[1]).'\')">';
    foreach ($val as $key => $value) {
      if ($key > 0) {
      echo '<td>'.$value.'</td>';
    }
    }
    echo '</tr>';
  }
  echo '</table>';
  }
  ?>

<div id="Add" class="newspaper">
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
</div>
<script><?php
  $sql = "SELECT FirstName FROM grower WHERE ID = ?";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_COOKIE['PrimeIDGrower']]);
  $arr = $stmt->fetch(PDO::FETCH_NUM);
  echo 'document.getElementById("Grower").innerHTML = "'.$arr[0].'";';?>
function edit(GrowerID,ElementName) {
  document.cookie="PrimeIDGrower=" + GrowerID;
  document.getElementById("Grower").innerHTML = ElementName;
  //location.href = "edit.php";
}
function toggle() {
  var x = document.getElementById("Add");
    if(x.style.display=="inline-block") {
      x.style.display="none";
    }
    else if(x.style.display=="none" || x.style.display=="") {
      x.style.display="inline-block";
    }
}
</script>
</body>
</html>
