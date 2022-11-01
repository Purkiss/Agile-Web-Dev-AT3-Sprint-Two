<!--
 * Poorav 
 * 30045900
-->

<?php 
include_once('nav.php');
include_once('connection.php');

$database = new Connection();
$db = $database->open();

if (isset($_POST['create'])) {
	$database = new Connection();
    $db = $database->open();
    $name = $_POST['name'];
    $lifespan = $_POST['lifespan'];
    $thumbnail = $_POST['thumbnail'];
    $portrait = $_POST['portrait'];
	$style = $_POST['style'];
	
	
	// PHP file_get_contents() function requires the full filepath to work, e.g. 'C:\Desktop\portrait.png'
	// HTML "file" input can't access the full filepath for security reasons, only gives 'portrait.png'
	// Use $fullPath variable in conjunction with "file" input to generate a full filepath
	// *** CHANGE THIS TO SUIT THE SERVER'S FILE STRUCTURE ***
    $fullPath = '/var/www/at_three_sprint_two/images/';
		
	$thumbnailFullPath = $fullPath . $thumbnail;
	$portraitFullPath = $fullPath . $portrait;
		
	$thumbnail_64 = base64_encode(file_get_contents($thumbnailFullPath));
	$portrait_64 = base64_encode(file_get_contents($portraitFullPath));
    
	//$thumbnail_64 = base64_encode(file_get_contents($thumbnailPath));
	//$portrait_64 = base64_encode(file_get_contents($portraitPath));
		
    try {
		//$sql = "INSERT INTO `artists`(`name`, `lifespan`, `thumbnail`, `portrait`, `style`) VALUES ('$name', '$lifespan', :thumbnail, :portrait, '$style')";
    	$sql = "INSERT INTO `artists`(`name`, `lifespan`, `thumbnail`, `portrait`, `style`) VALUES ('$name', '$lifespan', '$thumbnail_64', '$portrait_64', '$style')";
		
		$database = new Connection();
		$db = $database->open();
		$stmt = $db->prepare($sql);
		
		//$stmt->bindParam(':thumbnail', $thumbnail_64);
		//$stmt->bindParam(':portrait', $portrait_64);
		//$stmt->bindParam(':id', $id);
		
    	echo "New artist added to database";
		return $stmt->execute();
	} catch(PDOException $e) {
        echo "'ruh roh' - scooby doo";
    }
    $database->close(); 
}
?>

<!DOCTYPE html>

<!--
 * Poorav 
 * 30045900
-->
 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Create Artist</title>
	<link rel="stylesheet" type="text/css" href="index_files/style.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">    
    	
<table class="table">
<thead>
<th>Name</th>
<th>Lifespan</th>
<th>Thumbnail</th>
<th>Portrait</th>
<th>Style</th>
<th></th>
</thead>
<tbody>
<tr>
<form action="" method="POST">
<td><input type="text" size=10 name="name" value="test"></td>
<td><input type="text" size=10 name="lifespan" value="1900-1950"></td>
<td><label for="mythumbnail">Select a file:</label><input type="file" size=15 id="mythumbnail" name="thumbnail" value=""/> </td>
<td><label for="myportrait">Select a file:</label><input type="file" size=15 id="myportrait" name="portrait" value=""/> </td>
<td><input type="text" size=10 name="style" value="test"></td>
<td><input type="submit" size=10 name="create" value="Create"></td>
</form>
</tr>
		</tbody>
	  </table>
	</div>
</body>
</html>
