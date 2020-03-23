<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head><link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
  <table>
    <div class="toprow">
    <tr>
      <td>FertAppID</td>
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
      newRow(1, $_SESSION['GenAppID'], null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
      function newRow($rowNm, $GenAppID, $FertAppID, $AppType, $FertID, $MonitorAcres, $Rate, $TotalUsed, $AdjustedAmount, $Date, $ReconcileDate) {
        echo '<tr name="'.$rowNm.'">';
        echo '<form method="get" id="form" name="'.$rowNm.'">';
        echo '<td><input type="number" value="'.$FertAppID.'"/></td>';
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
                  json = {FertAppID : forms[x][0].value, Apptype : forms[x][1].value, FertID : forms[x][2].value, MonitorAcres : forms[x][3].value, Rate : forms[x][4].value, TotalUsed : forms[x][5].value, AdjustedAmount : forms[x][6].value, Date : forms[x][7].value,
                  ReconcileDate : forms[x][8].value, tableName : "appferttable", length : forms.length, counter : x};
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
