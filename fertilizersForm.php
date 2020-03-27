<html>
<title>Fertilizer Form</title>
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
  <table>
    <div class="toprow">
    <tr>
      <td>AppType</td>
      <td>FertID</td>
      <td>MonitorAcres</td>
      <td>Rate</td>
      <td>TotalUsed</td>
      <td>AdjustedAmount</td>
      <td>Date</td>
      <td>ReconcileDate</td>
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
$sql = "SELECT 	ID, GenAppID, AppType, FertID, MonitorAcres, Rate, TotalUsed, AdjustedAmount, Date, ReconcileDate FROM appferttable WHERE UserID = ? AND GenAppID = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$_SESSION['ID'], $_SESSION['PrimeID']]);
$val = $stmt->fetch(PDO::FETCH_NUM);
$_SESSION['rowPrimaryID'] = array($val[1]);
      newRow(1, $_SESSION['PrimeID'], $val[2], $val[3], $val[4], $val[5], $val[6], $val[7], $val[8], $val[9], $val[10]);
            function newRow($rowNm, $GenAppID, $AppType, $FertID, $MonitorAcres, $Rate, $TotalUsed, $AdjustedAmount, $Date, $ReconcileDate) {
              echo '<tr name="'.$rowNm.'">';
              echo '<form method="get" id="form" name="'.$rowNm.'">';
              echo '<td><input type="number" value="'.$AppType.'"/></td>';
              echo '<td><input type="number" value="'.$FertID.'"/></td>';
              echo '<td><input type="number" id="sel'.$rowNm.'" onchange="Updat('.$rowNm.')" value="'.$MonitorAcres.'"/></td>';
              echo '<td><input type="number" id="sel'.$rowNm."1".'" onchange="Updat('.$rowNm.')" value="'.$Rate.'"/></td>';
              echo '<td><input type="number" id="sel'.$rowNm."2".'" value="'.$TotalUsed.'"/></td>';
              echo '<td><input type="number" value="'.$AdjustedAmount.'"/></td>';
              echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$Date.'"/></td>';
              echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$ReconcileDate.'"/></td>';
              echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
              echo "</tr>";
              echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
       ?>
       <script>
       function clearRow(x){
         var form = document.getElementsByTagName("form");
         for (var i=0; i < form[x].length; i++) {
         form[x][i].value = "";
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
                 json = {Apptype : forms[x][0].value, FertID : forms[x][1].value, MonitorAcres : forms[x][2].value, Rate : forms[x][3].value, TotalUsed : forms[x][4].value, AdjustedAmount : forms[x][5].value, Date : forms[x][6].value,
                 ReconcileDate : forms[x][7].value, tableName : "appferttable", length : forms.length, counter : "update"};
                 json = JSON.stringify(json);
                 xmlhttp.open("POST", "submit.php", false);
                 xmlhttp.send(json);
               }
           location.href = "forms.php";
         };
         </script>
  <script type="text/javascript" src="headjs.js"></script>
  <script>
  var x = "forms";
  document.getElementById(x).className += " activeNav";
  </script>
</body>
</html>
