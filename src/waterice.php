<?php 
	require '../lib/lib.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8;" />
		<title>CROP CUT</title>	
		<link rel="stylesheet" type="text/css" href="../../../css/style_parse.css" media="screen" />
	</head>
	<body >
		<?php
		//echo "test";
			$file_handle = $waterice->ReadFile();
			while (!feof($file_handle) ) {
				$ltxt = fgetcsv($file_handle, 10240);
				$data = $grp1 = array();
				$data = $ltxt;
				//echo $data[493]."<br>";
				if(!empty($ltxt[47])){
					if($db->verifyData($ltxt[6])){						
						echo "no duplicate : ".$ltxt[6];
						$waterice->insertData($data);							
					}else{
						echo "exist".$ltxt[6]."<br>";
						$flag = "0";
					}
				}else{
					echo "empty file <br>";
					$flag = "0";
				}	

				echo "<br>";
 			}
			fclose($file_handle);	
		
		?>
	</body>	
</body>
</html>
