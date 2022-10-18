<?php 
include_once('nav.php');
include_once('connection.php');

  if (isset($_POST['submit'])) {
	  
	$database = new Connection();
    $db = $database->open();
  	$id = $_POST['id'];
    $name = $_POST['name'];
    $lifespan = $_POST['lifespan'];
    $thumbnail = $_POST['thumbnail'];
    $portrait = $_POST['portrait'];
	$style = $_POST['style'];
  

    try {
        $sql = "INSERT INTO `artists`(`id`, `name`, `lifespan`, `thumbnail`, `portrait`, `style`) VALUES (`$id`, `$name`, `$lifespan`, `$thumbnail`, `$portrait`, `$style`)";
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
<th>Id</th>
<th>Name</th>
<th>Lifespan</th>
<th>Thumbnail</th>
<th>Portrait</th>
<th>Style</th>
</thead>
<tbody>
<tr>
<form action="" method="POST">
<td><input type="text" size=10 name="Id" value="test"</td>
<td><input type="text" size=10 name="Name" value="test"></td>
<td><input type="text" size=10 name="lifespan" value="test"></td>
<td><input type="text" size=10 name="Thumbnail" value="test"></td>
<td><input type="text" size=10 name="Portrait" value="test"></td>
<td><input type="text" size=10 name="Style" value="test"></td>
<td><input type="submit" size=10 name="Submit" value="Create"></td>
</form>
</tr>
</table>
</body>
</html>