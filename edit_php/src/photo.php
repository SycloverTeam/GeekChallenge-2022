<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>3dPhoto</title>
		<link rel="stylesheet" type="text/css" href="./photo.css"/>
	</head>
	<body>
		<div class="show">
			<div class="box">
			<?php 
			$path = $_COOKIE['path'];
			$dirArr = scandir('./upload/'.$path.'/');
			foreach($dirArr as $f){
				if($f !== '.' && $f !== '..'){
					echo "<img src=\"".'./upload/'.$path.'/'.$f."\" >";
				}
			}
			?>
			</div>
		</div>
        <h3>
        </h3>
	</body>
</html>
