<?php



$url = 'https://docs.google.com/spreadsheets/d/1_o2fjRmVIMyLkGXMwsqFeJlnowcExi-AJvm1pmRWvBY/export?format=csv&id=1_o2fjRmVIMyLkGXMwsqFeJlnowcExi-AJvm1pmRWvBY&gid=237636955';



$row=0;
$count=0;

  $server = "localhost";
  $uname = "upgrado3_client";
  $pword = "Passterm";
  try {
  $connection = new PDO("mysql:host=$server;dbname=upgrado3_fieldreports",$uname,$pword);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
  }
  catch (PDOException $e){echo "failed to connect to database, " . $e->getMessage();
  }
  $sql = 'DELETE FROM inventory WHERE 1=1';
  $stmt = $connection->prepare($sql);
  $stmt->execute([]);
  $sql = 'INSERT INTO `inventory`(`ID`, `DropboxNum`, `Consultant`, `State`, `FieldID`, `Boundary`, `SpatialPlotLocation`, `Notes`) VALUES (?,?,?,?,?,?,?,?)';
  $stmt = $connection->prepare($sql);

$file = fopen($url,"r");
while(! feof($file))
  {
		$count++;
		// echo $count;
    $csv = fgetcsv($file);
    if ($count != 1 && $count != 55 && $count != 56) {
  $stmt->execute([$csv[0],$csv[1],$csv[2],$csv[3],$csv[4],$csv[5],$csv[6],$csv[7]]);
}
  }
fclose($file);

if (($handle = fopen($url, "r")) !== FALSE)
{

    while (($data = fgetcsv($handle, 10, ",")) !== FALSE)
	{
		$row++;
			// echo $row;

		if($row>$count-4)
		{
			//print_r($data);
			$result[]=$data;

		}


    }
		  $tmpArr = array();
    foreach ($result as $sub) {
      $tmpArr[] = implode('',$sub);
    }
    //$result1 = implode('',$tmpArr);
    //var_dump($tmpArr);
     //print($result1.";");






		//print_r($result);

          //echo($result);
              		//return $result;
               //$json = json_encode($result);
		//print_r($json);
                 //return $json;
                fclose($handle);
}

?>
