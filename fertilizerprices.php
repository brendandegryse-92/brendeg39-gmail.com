<html>
<title>Fertilizer Prices</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1><a href="index.php" class="head">Simplified Technology Services Inc.</a></h1>
<div class="nav">
  <a href="operators.php">Operators</a>
  <a href="farms.php">Farms</a>
  <a href="fields.php">Fields</a>
  <a class="activeNav" href="prices.php">Prices</a>
  <a href="crop.php">Crop</a>
  <a href="applicants.php">Applications</a>
  <a href="#Chemicals">Chemicals</a>
  <a href="#Feritalizers">Feritalizers</a>
  <a href="forms.php">Forms</a>
  <?php
  session_start();
  if($_SESSION['ID'] < 1) {header('Location: login.php');}
  $server = "localhost";
  $uname = "client";
  $pword = "Pass";
try {
  $connection = new PDO("mysql:host=$server;dbname=simplifiedtechnologyservices",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();}
if ($_SESSION['ID'] == null) {
  echo '<a href="login.php" class="Login">Login</a>';
}
else {
$sql = "SELECT name FROM users WHERE UserID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$name = $stmt->fetch();
echo '<a href="account.php">'.$name[0].'</a>';
}
  ?>
  </div>
  <table>
    <div class="toprow">
    <tr>
        <td>Fertilizer</td>
        <td>EnteredUnits</td>
        <td>PurchasedUnits</td>
        <td>Ratio</td>
        <td>ShowOnReport</td>
        <td>Active</td>
      <td class="button"><button onclick="submit()">Submit</button></td>
    </tr>
  </div>
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
$sql = "SELECT ID, Name, EnteredUnits, PurchasedUnits, Ratio, ShowOnReport, IsActive FROM fertilizers WHERE UserID = ? AND ID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID'], $_SESSION['PrimeID']]);
$name = $stmt->fetch();
$_SESSION['rowPrimaryID'][0] = $_SESSION['PrimeID'];
echo '<form><tr><td><input value="'.$name[1].'"></input></td>';
echo '<td><input value="'.$name[2].'"></input></td>';
echo '<td><input value="'.$name[3].'"></input></td>';
echo '<td><input type="number" value="'.$name[4].'"></input></td>';
if ($name[5] == 1) {echo '<td><input name="Active" type="checkbox" checked/></td>';}
if ($name[5] == 0) {echo '<td><input name="Active" type="checkbox"/></td>';}
if ($name[6] == 1) {echo '<td><input name="Active" type="checkbox" checked/></td>';}
if ($name[6] == 0) {echo '<td><input name="Active" type="checkbox"/></td>';}
echo '<td background-color="white" class="img"x><img class="img" src="Xout.svg" onclick="clearRow(0)"/></td></tr></table>';
       ?>
        <script>
        function clearRow(x){
          var form = document.getElementsByTagName("form");
          for (var i=0; i < form[x].length; i++) {
          form[x][i].value = "";
          //alert(form[x][i])
          }
        }
        function submit() {
          var forms = document.getElementsByTagName("form");
          var text = "";
          var json;
          var xmlhttp = new XMLHttpRequest();
          var myObj;
          var x=0;
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //myObj = JSON.parse(this.responseText);
              //alert(this.responseText);
            }
          }
            for (x = 0; x < (forms.length); x++){
                  json = {Name : forms[x][0].value, EnteredUnits : forms[x][1].value, PurchasedUnits : forms[x][2].value, Ratio : forms[x][3].value, ShowOnReport : forms[x][4].checked, Active : forms[x][5].checked, tableName : "fertilizers", length : forms.length, counter : "update"};
                  if (forms[x][5].checked == true) {json.Active = 1;}
                  if (forms[x][5].checked == false) {json.Active = 0;}
                  if (forms[x][4].checked == true) {json.ShowOnReport = 1;}
                  if (forms[x][4].checked == false) {json.ShowOnReport = 0;}
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", false);
                  xmlhttp.send(json);
                }
            location.href= "fertilizers.php";
          };
        </script>
</body>
</html>
