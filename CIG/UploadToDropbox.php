<html><head>
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico">
  <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="ngtax1dgxdfao30"></script>
  </head><body><form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <input type="file" name="DBFile" id="DBFile" />
    <input type="submit" />
    </form>
    <?php
  if (isset($_FILES["DBFile"])) {
$target_dir = "tempFarmerFilesCIG/";
$target_file = $target_dir . basename($_FILES["DBFile"]["name"]);
move_uploaded_file($_FILES["DBFile"]["tmp_name"], $target_file);
echo '<script>Dropbox.save("https://upgradeag.com/CIG/tempFarmerFilesCIG/'.$_FILES["DBFile"]["name"].'", "'.$_FILES["DBFile"]["name"].'");</script>';
//echo '<a href="https://upgradeag.com/CIG/tempFarmerFilesCIG/'.$_FILES["DBFile"]["name"].'" class="dropbox-saver"></a>';
  }
    ?>
    </body>
    <script>/**
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://www.dropbox.com/oauth2/authorize?client_id=ngtax1dgxdfao30&response_type=code');
    xhr.send();
    xhr.open('POST', 'https://content.dropboxapi.com/2/files/upload');
    xhr.send();
    xhr.onload = function() {
  if (xhr.status != 200) { // analyze HTTP status of the response
    alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
  } else { // show the result
    alert(`Done, got ${xhr.response.length} bytes`); // response is the server
  }
};//https://content.dropboxapi.com/2/files/upload**/
    </script>
</html>