<?php 
include_once('nav.php');
include_once('connection.php');

  if (isset($_POST['submit'])) {
	  
	$database = new Connection();
    $db = $database->open();
    $name = $_POST['name'];
    $lifespan = $_POST['lifespan'];
    $thumbnail = $_POST['thumbnail'];
    $portrait = $_POST['portrait'];
	$style = $_POST['style'];
  

    try {
        $sql = "INSERT INTO `artists`(`name`, `lifespan`, `thumbnail`, `portrait`, `style`) VALUES ('$name', '$lifespan', '$thumbnail', '$portrait', '$style')";
        $result = $db->query($sql);
		echo "New Artist has been added to database";
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
	<title>All Artists</title>
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
</thead>
<tbody>
<tr>
<form action="" method="POST">
<td><input type="text" size=10 name="name" value="test"></td>
<td><input type="text" size=10 name="lifespan" value="1900-1950"></td>
<td><input type="text" size=10 name="thumbnail" value="test"></td>
<td><input type="text" size=10 name="portrait" value="test"></td>
<td><input type="text" size=10 name="style" value="test"></td>
<td><input type="submit" size=10 name="submit" value="Create"></td>
</form>
</tr>
</table>
</body>
</html>