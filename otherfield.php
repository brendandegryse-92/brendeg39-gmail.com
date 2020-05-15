<html>
<head>
</head>
<body>
  <a href="other.php">Grower</a>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Field Name:<input type="text" name="FieldName"></input>
    Acres:<input type="number" name="Acres"></input>
    County:<input type="text"name="County"></input>
    Township:<input type="text" name="Township"></input>
    Section:<input type="text" name="Section"></input>
    Quarter:<input type="text" name="Quarter"></input>
    Tillage:<input type="text" name="Tillage"></input>
    Planting Date:<input type="number" name="PlantingDate"></input>
    2019 Crop:<input type="text" name="LastYearCrop"></input>
    How Many Years Corn:<input type="text" name="YearsCorn"></input>
    Irrigated:<input type="text" name="Irrigated"></input>
    Rotational:<input type="text" name="Rotational"></input>
    Crop Year:<input type="number" name="Crop Year"></input>
    Cover Crop:<input type="text" name="CoverCrop"></input>
    Date Seeded:<input type="text" name="DateSeeded"></input>
    How Was It Seeded:<input type="text" name="HowSeeded"></input>
    Ncredits:<input type="number" name="Ncredits"></input>
    How Was It Killed:<input type="text" name="HowKilled"></input>
    Date:<input type="date" name="HowKilled"></input>
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
if (count($arr)>0) {
  echo '<table><tr><th>Field Name</th><th>Acres</th><th>County</th><th>Township</th><th>Section</th><th>    </th><th>    </th><th>    </th><th>    </th><th>    </th><th>    </th></tr>';
foreach ($arr as $i=>$val) {
  array_push($_SESSION['rowPrimaryID'], $val[0]);
  echo '<tr onclick="edit('.$val[0].')">';
  foreach ($val as $key => $value) {
    if ($key > 0) {
    echo '<td>'.$value.'</td>';
  }
  }
  echo '</tr>';
}
}
  if (isset($_POST['FirstName'])) {
  $sql = 'INSERT INTO grower (FirstName, MI, LastName, CompanyName, MailingAddress, City, State, Zip, HomePhone, MobilePhone, Email) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_POST['FirstName'], $_POST['MI'], $_POST['LastName'], $_POST['CompanyName'], $_POST['MailAdd'], $_POST['City'], $_POST['State'], $_POST['ZIP'], $_POST['Home'], $_POST['Mobile'], $_POST['Email']]);
  }
?>
<script>
function edit(x) {
  document.cookie="PrimeID=" + x;
  location.href = "edit.php";
}
</script>
</body>
</html>
