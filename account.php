<html>
<title>Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <div include="head.html"></div>
<h2>Need Help?</h2>
<h3>Phone: <a href="tel:419-212-0479">(419) 212-0479</a></h3>
<h3>Email: <a href="mailto:mcguire9@gmail.com"> mcguire9@gmail.com</a></h3><script>
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
</HTML>
