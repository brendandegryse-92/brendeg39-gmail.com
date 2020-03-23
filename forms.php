<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
<style>
  tr:nth-child(even) {
  background-color: #f2f2f2;}

  .noshadow {
    filter: none;
  }
</style>
</head>
<body>
  <div include="head.html"></div>
  <table>
    <tr>
      <th>Applicator</th>
      <th>AppType</th>
      <th>DateApplied</th>
      <th>StopTime</th>
      <th>Conditions</th>
      <th>ReconcileDate</th>
      <th>FieldFrom</th>
      <th>FieldTo</th>
      <th>AutoSteerHeading</th>
    </tr>
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
$sql = 'SELECT GenAppID, Applicator, AppType, DateApplied, StopTime, Conditions, ReconcileDate, FieldFrom, FieldTo, AutoSteerHeading FROM appgeninfo Where UserID = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID']]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
$_SESSION['rowPrimaryID'] = array();
foreach ($arr as $i=>$val) {
  array_push($_SESSION['rowPrimaryID'], $val[0]);
  foreach ($val as $key => $value) {
    if ($value == "") {
      $arr[$i][$key] = "--";
    }
  }
}
foreach ($arr as $i=>$val) {
  echo '<tr onclick="load('.$i.')"><td class="noshadow">'.$val[1].'</td>';
  echo '<td class="noshadow">'.$val[2].'</td>';
  echo '<td class="noshadow">'.$val[3].'</td>';
  echo '<td class="noshadow">'.$val[4].'</td>';
  echo '<td class="noshadow">'.$val[5].'</td>';
  echo '<td class="noshadow">'.$val[6].'</td>';
  echo '<td class="noshadow">'.$val[7].'</td>';
  echo '<td class="noshadow">'.$val[8].'</td>';
  echo '<td class="noshadow">'.$val[9].'</td>';
  echo '</tr>';
}
?>
<script>
function load(x) {
  var xmlhttp = new XMLHttpRequest();
  json = {tableName : "PrimeID", PrimeID : x};
  json = JSON.stringify(json);
  xmlhttp.open("POST", "submit.php", false);
  xmlhttp.send(json);
  location.href = "formsubmit.php";
}
</script><script>
function includeHTML() {
var z, i, elmnt, file, xhttp;
/* Loop through a collection of all HTML elements: */
z = document.getElementsByTagName("*");
for (i = 0; i < z.length; i++) {
  elmnt = z[i];
  /*search for elements with a certain atrribute:*/
  file = elmnt.getAttribute("include");
  if (file) {
    /* Make an HTTP request using the attribute value as the file name: */
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status == 200) {elmnt.innerHTML = this.responseText;}
        if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
        /* Remove the attribute, and call this function once more: */
        elmnt.removeAttribute("include");
        includeHTML();
      }
    }
    xhttp.open("POST", file, false);
    xhttp.send();
    /* Exit the function: */
    return;
  }
}
}
</script>
<script>
includeHTML();
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.status == 200) {document.getElementById("account").innerHTML = this.responseText;}
}
xhttp.open("POST", "accountphp.php", false);
xhttp.send();
</script>
  </body>
  </html>
