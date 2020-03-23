<html>
<title>Fertilizer Prices</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
  <style>
  .buttons {
    padding: 3px;
    border-radius: 7px;
    text-decoration: none;
    color: white;
    background-color: #3d3c38;
  }
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
    <div class="toprow">
    <tr>
        <th>Fertilizer</th>
        <th>EnteredUnits</th>
        <th>PurchasedUnits</th>
        <th>Ratio</th>
        <th>ShowOnReport</th>
        <th>Active</th>
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
  $rowIndex = array(0);
  $_SESSION['rowPrimaryID'] = array();
  $_SESSION['counter'] = 0;
  $GLOBALS['rows'] = array(array());
  $sql = "SELECT ID, Name, EnteredUnits, PurchasedUnits, Ratio, ShowOnReport, IsActive FROM fertilizers WHERE UserID = ? ORDER BY Name ASC";
  $stmt = $connection->prepare($sql);
  $stmt->execute([$_SESSION['ID']]);
  $arr = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach ($arr as $i=>$val) {
    foreach ($val as $key => $value) {
      if ($value == "") {
        $arr[$i][$key] = "--";
      }
    }
  }
  $_SESSION['rowPrimaryID'] = array();
  foreach ($arr as $i=>$val) {
    $_SESSION['rowPrimaryID'][$i] = $val[0];
    echo '<tr><td onclick="load('.$i.')" class="noshadow">'.$val[1].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[2].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[3].'</td>';
    echo '<td onclick="load('.$i.')" class="noshadow">'.$val[4].'</td>';
    if ($val[5] == 1) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" checked/></td>';}
    if ($val[5] == 0) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" /></td>';}
    if ($val[6] == 1) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" checked/></td>';}
    if ($val[6] == 0) {echo '<td onclick="load('.$i.')"><input onclick="load('.$i.')" name="Active" type="checkbox" /></td>';}
    echo '<td class="noshadow"><a class="buttons" onclick="loadprices('.$i.')">Prices</a></td>';
    echo '</tr>';
    if ($i == count($arr)-1) {
      echo '</table><a href="fertilizerpricesnew.php" class="buttons">New Row</a>';
    }
  }
    array_push($_SESSION['rowPrimaryID'], -1);
       ?>
        <script>
        function loadprices(x) {
          var xmlhttp = new XMLHttpRequest();
          json = {tableName : "PrimeID", PrimeID : x};
          json = JSON.stringify(json);
          xmlhttp.open("POST", "submit.php", false);
          xmlhttp.send(json);
          location.href = "fertilizerpriceyears.php";
        };
        function load(x) {
          var xmlhttp = new XMLHttpRequest();
          json = {tableName : "PrimeID", PrimeID : x};
          json = JSON.stringify(json);
          xmlhttp.open("POST", "submit.php", false);
          xmlhttp.send(json);
          location.href = "fertilizerprices.php";
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
