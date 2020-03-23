<html>
<title>Fertalizer Prices</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div include="head.html"></div>
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
echo '<form><tr><td><input value=""></input></td>';
echo '<td><input value=""></input></td>';
echo '<td><input value=""></input></td>';
echo '<td><input type="number" value=""></input></td>';
echo '<td><input name="Active" type="checkbox" checked/></td>';
echo '<td><input name="Active" type="checkbox" checked/></td></tr></table>';
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
                  json = {Name : forms[x][0].value, EnteredUnits : forms[x][1].value, PurchasedUnits : forms[x][2].value, Ratio : forms[x][3].value, ShowOnReport : forms[x][4].checked, Active : forms[x][5].checked, tableName : "fertilizers", length : forms.length, counter : "new"};
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
