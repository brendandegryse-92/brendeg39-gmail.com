<!DOCTYPE html>
<meta name="description" content="Enter Applications">
<html>
<title>Applications</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div include="head.html"></div>
  <div style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
      <td>Applicator</td>
      <td>AppType</td>
      <td>DateApplied</td>
      <td>StopTime</td>
      <td>Conditions</td>
      <td>ReconcileDate</td>
      <td>FieldFrom</td>
      <td>FieldTo</td>
      <td>AutoSteerHeading</td>
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
      newRow(1, null, null, null, null, null, null, null, null, null, null, null, null, null, 1);
  echo '<input type="radio" class="radio" id="chemical" name="type" value="chemical" required>';
  echo '<label for="chemical">Chemical</label>';
  echo '<input class="radio" type="radio" id="fertilizer" name="type" value="fertilizer">';
  echo '<label for="fertilizer">Fertilizer</label>';
  echo '<input class="radio" type="radio" id="misc" name="type" value="misc">';
  echo '<label for="misc">Misc</label>';
      function newRow($rowNm, $GenAppID, $Applicator, $AppType, $DateApplied, $StopTime, $Conditions, $ReconcileDate, $FieldFrom, $FieldTo, $AutoSteerHeading) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input value="'.$Applicator.'"/></td>';
        echo '<td><input value="'.$AppType.'"/></td>';
        echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$DateApplied.'"/></td>';
        echo '<td><input value="'.$StopTime.'"/></td>';
        echo '<td><input value="'.$Conditions.'"/></td>';
        echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$ReconcileDate.'"/></td>';
        echo '<td><input type="number" value="'.$FieldFrom.'"/></td>';
        echo '<td><input type="number" value="'.$FieldTo.'"/></td>';
        echo '<td><input value="'.$AutoSteerHeading.'"/></td>';
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
          if (!document.getElementById("chemical").checked && !document.getElementById("fertilizer").checked && !document.getElementById("misc").checked) {
            alert("Please select an applicant type");
            return;
          }
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
                  json = {Applicator : forms[x][0].value, AppType : forms[x][1].value, DateApplied : forms[x][2].value, StopTime : forms[x][3].value, Conditions : forms[x][4].value,
                  ReconcileDate : forms[x][5].value, FieldFrom : forms[x][6].value, FieldTo : forms[x][7].value, AutoSteerHeading : forms[x][8].value, Type : "", tableName : "appgeninfo", length : forms.length, counter : x};
                  if (document.getElementById("chemical").checked) {json.Type = "chemical";}
                  if (document.getElementById("fertilizer").checked) {json.Type = "fertilizer";}
                  if (document.getElementById("misc").checked) {json.Type = "misc";}
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", false);
                  xmlhttp.send(json);

              if (document.getElementById("chemical").checked) {
                location.href = "chemicals_apply.php";
              }
              if (document.getElementById("fertilizer").checked) {
                location.href = "fertilizers_apply.php";
              }
              if (document.getElementById("misc").checked) {
                location.href = "misc_apply.php";
              }
          };
        </script><script type="text/javascript" src="headjs.js"></script>
        <script>
        var x = "applicants";
        document.getElementById(x).className += " activeNav";
        </script>
</body>
</html>
