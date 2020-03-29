<html>
<title>Renew</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <button class="buttons" onclick="renew()">Renew my Account</button>
<script>
function renew() {
var xmlhttp = new XMLHttpRequest();
var json = {tableName : "renew"};
json = JSON.stringify(json);
xmlhttp.open("POST", "submit.php", false);
xmlhttp.send(json);
location.href= "index.php";}
</script>
</body>
</html>
