<html>
<title>Home</title>
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
  <p>Welcome to On Farm Record Keeping</p><script>
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
