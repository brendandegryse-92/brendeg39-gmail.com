<html>
<head>
  <link rel="stylesheet" href="DataInputPage.css">
  <style>
    #Add {
      display: none;
    }
  </style>
    <script type="text/javascript">
            function File() {
  const file = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    document.getElementById("Dropbox").href = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
            /**var fr = new FileReader();
            fr.readAsDataURL(document.getElementById('inputfile').files[0]);
              document.getElementById("Dropbox").href = fr.result;**/
            }
    </script>
  <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="ngtax1dgxdfao30"></script>
</head>
<body>
  <input type="file" id="inputfile" onchange="File()"/>
<a href="C:\Users\brend\Downloads\CIG2020_10GR001_boundary_Boundary Name.kml" id="Dropbox" class="dropbox-saver"></a>
  <nav>
  <a href="other.php">Grower</a> <a href="otherfield.php">Field</a> <a href="manure.php">Manure</a> <a href="fertapps.php">Fertilizer Applications</a> <a href="otherlogin.php">Login</a> <a href="otherregister.php">Register</a>
  </nav><br>
  <?php
  session_start();
  if (!isset($_SESSION['ID'])) {
    header("Location: otherlogin.php");
  }
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
    if ($_POST['FirstName'] != "") {
    $sql = 'INSERT INTO grower (FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email, UserID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email'], $_SESSION['ID']]);
    $_POST['FirstName'] = "";
    header("Location: other.php");
    }
  ?>
  <div id="Grower">Active Grower: </div><button onclick="location.href = 'edit.php'">Edit Grower</button><button onclick="location.href = 'otherfield.php'">Add Field</button><br />
  <button onclick="toggle()">Add Grower</button>
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
<script>
function edit(GrowerID,ElementName) {
  document.cookie="PrimeIDGrower=" + GrowerID;
  document.getElementById("Grower").innerHTML = "Active Grower: " + ElementName;
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
