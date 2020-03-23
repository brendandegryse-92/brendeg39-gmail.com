<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head><link rel="stylesheet" href="styles.css"/>
  <style>
  input {
    width: 175px;
  }
  </style>
</head>
<body>
  <div include="head.html"></div>
  <div style="overflow: auto;">
  <table>
    <div class="toprow">
    <tr>
      <td>ChemAppID</td>
      <td>AppType</td>
      <td>ChemID</td>
      <td>MonitorAcres</td>
      <td>Rate</td>
      <td>TotalUsed</td>
      <td>AdjustedAmount</td>
      <td>Date</td>
      <td>ReconcileDate</td>
      <td>WindSpeed</td>
      <td>WindDirection</td>
      <td>Humidity</td>
      <td>Temperature</td>
      <td>TipSize</td>
      <td>Pressure</td>
      <td>GroundSpeed</td>
      <td>Other</td>
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
      function newRow($rowNm, $GenAppID, $ChemAppID, $AppType, $ChemID, $MonitorAcres, $Rate, $TotalUsed, $AdjustedAmount, $Date, $ReconcileDate, $WindSpeed, $WindDirection, $Humidity, $Temperature, $TipSize, $Pressure, $GroundSpeed, $Other) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input type="number" value="'.$ChemAppID.'"/></td>';
        echo '<td><input type="number" value="'.$AppType.'"/></td>';
        echo '<td><input type="number" value="'.$ChemID.'"/></td>';
        echo '<td><input type="number" id="sel'.$rowNm.'" onchange="Updat('.$rowNm.')" value="'.$MonitorAcres.'"/></td>';
        echo '<td><input type="number" id="sel'.$rowNm."1".'" onchange="Updat('.$rowNm.')" value="'.$Rate.'"/></td>';
        echo '<td><input type="number" id="sel'.$rowNm."2".'" value="'.$TotalUsed.'"/></td>';
        echo '<td><input type="number" value="'.$AdjustedAmount.'"/></td>';
        echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$Date.'"/></td>';
        echo '<td><input placeholder="yyyy-mm-dd" type="date" value="'.$ReconcileDate.'"/></td>';
        echo '<td><input type="number" value="'.$WindSpeed.'"/></td>';
        echo '<td><input type="number" value="'.$WindDirection.'"/></td>';
        echo '<td><input type="number" value="'.$Humidity.'"/></td>';
        echo '<td><input type="number" value="'.$Temperature.'"/></td>';
        echo '<td><input type="number" value="'.$TipSize.'"/></td>';
        echo '<td><input type="number" value="'.$Pressure.'"/></td>';
        echo '<td><input type="number" value="'.$GroundSpeed.'"/></td>';
        echo '<td><input type="number" value="'.$Other.'"/></td>';
        echo '<td background-color="white" class="img"x><img class="img" align="left" src="Xout.svg" onclick="clearRow('.$rowNm.')"/></td>';
        echo "</tr>";
        echo '</form>';
          //array_push($GLOBALS['rows'], array($rowNm, $OpID, $Name, $Address, $City, $State, $Zip, $Phone));
        }
        echo "</div>";
       ?>
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
                  json = {ChemAppID : forms[x][0].value, Apptype : forms[x][1].value, ChemID : forms[x][2].value, MonitorAcres : forms[x][3].value, Rate : forms[x][4].value, TotalUsed : forms[x][5].value, AdjustedAmount : forms[x][6].value, Date : forms[x][7].value,
                  ReconcileDate : forms[x][8].value, WindSpeed : forms[x][9].value, WindDirection : forms[x][10].value, Humidity : forms[x][11].value, Temperature : forms[x][12].value, TipSize : forms[x][13].value, Pressure : forms[x][14].value, GroundSpeed : forms[x][15].value, Other : forms[x][16].value, tableName : "appchemtable", length : forms.length, counter : x};
                  json = JSON.stringify(json);
                  xmlhttp.open("POST", "submit.php", false);
                  xmlhttp.send(json);
                }
            location.href = "applicants.php";
          };
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
