<!DOCTYPE html>
<meta name="description" content="Applications">
<html>
<title>Appications</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head><link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
  <div style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
      <td>GenAppID</td>
      <td>AppMiscEntryID</td>
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
      newRow(1, $_SESSION['GenAppID'], null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
      function newRow($rowNm, $GenAppID, $AppMiscEntryID, $AppType, $AppDescription, $EnteredAcres, $CostPerAcre, $TotalUsed, $AdjustedAmount) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input type="number" style="background-color: grey; color: white;" value="'.$GenAppID.'" disabled/></td>';
        echo '<td><input type="number" value="'.$AppMiscEntryID.'"/></td>';
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
       ?>
     </div>
        <script>
        function clearRow(x){
          var form = document.getElementsByTagName("form");
          for (var i=0; i < form[x].length; i++) {
          form[x][i].value = "";
          }
        }
        function dropdown(x) {
          var x = document.getElementById("select"+ x);
          x.style.display = "inline-block";
        }
        function dropclose(x) {
          var x = document.getElementById("select"+ x);
          x.style.display = "none";
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
                  json = {AppMiscEntryID : forms[x][1].value, Apptype : forms[x][2].value, AppDescription : forms[x][3].value, EnteredAcres : forms[x][4].value, CostPerAcre : forms[x][5].value, TotalUsed : forms[x][6].value, AdjustedAmount : forms[x][7].value, tableName : "appmiscentry", length : forms.length, counter : "new"};
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", true);
                  xmlhttp.send(json);
                }
            location.href = "applicants.php";
          };
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        highlight();
        function highlight() {
        var x = "applicants";
        try {
        document.getElementById(x).className += " activeNav";
          }
        catch(err) {window.setTimeout(highlight, 100);
            }
        }
        </script>
</body>
</html>
