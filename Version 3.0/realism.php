<!DOCTYPE html>

<!--
 * Poorav Sharma 
 * 30045900
 * 11/10/2022
-->

<html>
<head>
<title>Realism</title>
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
<?php
include_once('nav.php');
?>
	<div class="container">
	  <table class="table">
	    <thead>
		  <th>ID</th>
		  <th>Image</th>
		  <th>Title</th>
		  <th>Ye‎ar</th> <!-- if it doesn't work, check this -->
		  <th>Media</th>
		  <th>Artist</th>
		  <th>Style</th>
	    </thead>
		<tbody>
		  <?php
		    include_once('connection.php');

			$database = new Connection();
    		$db = $database->open();
			try{	
			  $sql = "SELECT * FROM content WHERE style = 'Realism'";
			  foreach ($db->query($sql) as $row) {
              
            	echo '<tr>';
            	echo '<td>' . $row['id'] . '</td>';
            	echo '<td>' .
            	    '<img src = "data:image/png;base64,' . $row['thumbnail'] . '" height = "100px"/>'
            	    . '</td>';
            	echo '<td>' . $row['title'] . '</td>';
            	echo '<td>' . $row['year'] . '</td>';
            	echo '<td>' . $row['media'] . '</td>';
            	echo '<td>' . $row['artist'] . '</td>';
            	echo '<td>' . $row['style'] . '</td>';
            	echo '</tr>';

			  }
			}
			catch(PDOException $e){
			  echo "'ruh roh' - scooby doo";
			}

			$database->close();

			  ?>
		</tbody>
	  </table>
	</div>
</body>
</html>