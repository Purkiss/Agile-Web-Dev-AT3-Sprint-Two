<?php 
include_once('nav.php');
include_once('connection.php');

  if (isset($_POST['submit'])) {
	  
	$database = new Connection();
    $db = $database->open();
  	$image = $_POST['image'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $media = $_POST['media'];
    $artist = $_POST['artist'];
    $style = $_POST['style'];
  	$thumbnail = $_POST['thumbnail'];

    try {
        $sql = "INSERT INTO `content`(`image`, `title`, `year`, `media`, `artist`, `style`, `thumbnail`) VALUES ('$image','$title','$year','$media','$artist','$style','$thumbnail')";
        $result = $db->query($sql);
		echo "New work of art added to database";
    } catch(PDOException $e) {
        echo "'ruh roh' - scooby doo";
    }
    $database->close(); 
  }
?>

<!DOCTYPE html>

<!--
 * James Boyd 
 * 30041547
 * 18/10/2022
-->

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Index</title>
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
<th>Image</th>
<th>Title</th>
<th>The Year</th>
<th>Media</th>
<th>Artist</th>
<th>Style</th>
<th>Thumbnail</th>
</thead>
<tbody>
<tr>
<form action="" method="POST">
<td><input type="text" size=10 name="image" value="test"></td>
<td><input type="text" size=10 name="title" value="test"></td>
<td><input type="text" size=1 name="year" value="1999"></td>
<td><input type="text" size=10 name="media" value="test"></td>
<td><input type="text" size=10 name="artist" value="1"></td>
<td><input type="text" size=10 name="style" value="test"></td>
<td><input type="text" size=10 name="thumbnail" value="test"></td>
<td><input type="submit" size=10 name="submit" value="Create"></td>
</form>
</tr>
</table>
</body>
</html>