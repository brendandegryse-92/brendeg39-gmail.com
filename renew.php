<!DOCTYPE html>
<meta name="description" content="Renew">
<html>
<title>Renew</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <button class="buttons" onclick="renew()">Renew my Account</button>
  <input id="renewdate" type="date"></input>
<script>
function renew() {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.status == 200) {
    //alert(this.responseText);
  }
}
var json = {tableName : "renew", date : document.getElementById("renewdate").value};
json = JSON.stringify(json);
xmlhttp.open("POST", "submit.php", true);
xmlhttp.send(json);
location.href= "index.php";
}
</script>
</body>
</html>
