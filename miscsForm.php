<!DOCTYPE html>
<meta name="description" content="Forms">
<html>
<title>Misc Forms</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
  <style>
  p {
    font-size: 50px;
    top: 17%;
  }
  </style>
</head>
<body>
  <div include="head.html"></div>
  <div style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
    <td>AppType</td>
    <td>AppDescription</td>
    <td>EnteredAcres</td>
    <td>CostPerAcre</td>
    <td>TotalUsed</td>
    <td>AdjustedAmount</td>
      <td class="button"><button onclick="submit()"> Submit </button></td>
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
$sql = "SELECT 	ID, GenAppID, AppType, AppDescription, EnteredAcres, CostPerAcre, TotalUsed, AdjustedAmount FROM appmiscentry WHERE UserID = ? AND GenAppID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID'], $_SESSION['PrimeID']]);
$val = $stmt->fetch(PDO::FETCH_NUM);
$_SESSION['rowPrimaryID'] = array($val[1]);
      newRow(1, $_SESSION['PrimeID'], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7]);
      function newRow($rowNm, $GenAppID, $AppType, $AppDescription, $EnteredAcres, $CostPerAcre, $TotalUsed, $AdjustedAmount) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input type="number" value="'.$AppType.'"/></td>';
        echo '<td><input type="number" value="'.$AppDescription.'"/></td>';
        echo '<td><input type="number" value="'.$EnteredAcres.'"/></td>';
        echo '<td><input type="number" value="'.$CostPerAcre.'"/></td>';
        echo '<td><input type="number" value="'.$TotalUsed.'"/></td>';
        echo '<td><input type="number" value="'.$AdjustedAmount.'"/></td>';
        echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
        echo "</tr>";
        echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
        echo "</div>";
       ?>
     </div>
       <script>
       function clearRow(x){
         var form = document.getElementsByTagName("form");
         for (var i=0; i < form[0].length; i++) {
         form[0][i].value = "";
         }
       }
       function Updat(x) {
         var mon = document.getElementById("sel"+x);
         var rate = document.getElementById("sel"+x+"1");
         var total = document.getElementById("sel"+x+"2");
         var tot = mon.value * rate.value;
         total.value = tot;
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
                 json = {Apptype : forms[x][0].value, AppDescription : forms[x][1].value, EnteredAcres : forms[x][2].value, CostPerAcre : forms[x][3].value, TotalUsed : forms[x][4].value, AdjustedAmount : forms[x][5].value, tableName : "appmiscentry", length : forms.length, counter : "update"};
                 json = JSON.stringify(json);
                 xmlhttp.open("POST", "submit.php", false);
                 xmlhttp.send(json);
               }
           location.href = "forms.php";
         };
         </script>
  <script type="text/javascript" src="headjs.js"></script>
  <script>
  highlight();
  function highlight() {
  var x = "forms";
  try {
  document.getElementById(x).className += " activeNav";
    }
  catch(err) {window.setTimeout(highlight, 100);
      }
  }
  </script>
</body>
</html>
