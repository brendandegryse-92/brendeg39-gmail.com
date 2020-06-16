<html><head>
  <link rel="shortcut icon" href="https://upgradeag.com/CIG/img/favicon.ico"><script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="ngtax1dgxdfao30"></script></head><body><form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <input type="file" name="DBFile" id="DBFile" />
    <input type="submit" />
    </form>
    <?php
  if (isset($_FILES["DBFile"])) {
$target_dir = "tempFarmerFilesCIG/";
$target_file = $target_dir . basename($_FILES["DBFile"]["name"]);
move_uploaded_file($_FILES["DBFile"]["tmp_name"], $target_file);
echo '<script>Dropbox.save("https://upgradeag.com/CIG/tempFarmerFilesCIG/'.$_FILES["DBFile"]["name"].'", "'.$_FILES["DBFile"]["name"].'");</script>';
  }
    ?>
    </body>
</html>