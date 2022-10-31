<!--
 * Poorav 
 * 30045900

-->

<?php 
include_once('nav.php');
include_once('connection.php');

$database = new Connection();
$db = $database->open();

if (isset($_POST['update'])) {
	$database = new Connection();
    $db = $database->open();
  	$id = $_POST['id'];
    $name = $_POST['name'];
    $lifespan = $_POST['lifespan'];
    $thumbnail = $_POST['thumbnail'];
    $portrait = $_POST['portrait'];
	$style = $_POST['style'];
	
	// Encodes images in base64 and adds them to the database as 'thumbnail' and 'portrait' fields
	function saveAsBase64($id, $thumbnailPath, $portraitPath) {
		// PHP file_get_contents() function requires the full filepath to work, e.g. 'C:\Desktop\portrait.png'
		// HTML "file" input can't access the full filepath for security reasons, only gives 'portrait.png'
		// Use $fullPath variable in conjunction with "file" input to generate a full filepath
		// *** CHANGE THIS TO SUIT THE SERVER'S FILE STRUCTURE ***
		$fullPath = 'C:\Users\James\Documents\xampp\htdocs\at3-2\images\\';
		
		$thumbnailFullPath = $fullPath . $thumbnailPath;
		$portraitFullPath = $fullPath . $portraitPath;
		
		$thumbnail_64 = base64_encode(file_get_contents($thumbnailFullPath));
		$portrait_64 = base64_encode(file_get_contents($portraitFullPath));
		
		$sql = "UPDATE artists SET thumbnail = :thumbnail, portrait = :portrait WHERE id = :id;";
		
		$database = new Connection();
		$db = $database->open();
		$stmt = $db->prepare($sql);
		
		$stmt->bindParam(':thumbnail', $thumbnail_64);
		$stmt->bindParam(':portrait', $portrait_64);
		$stmt->bindParam(':id', $id);
		
		return $stmt->execute();
	}

    try {
		$sql = 'UPDATE artists
				SET name=\''.$name.'\', lifespan=\''.$lifespan.'\', style=\''.$style.'\'  
				WHERE id=\''.$id.'\'';
        $result = $db->query($sql);
		saveAsBase64($id, $thumbnail, $portrait);
		echo "'Update successful'";
    } catch(PDOException $e) {
        echo "'ruh roh' - scooby doo";
    }
    $database->close(); 
}
else if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	  
	try{
		$sql = 'DELETE FROM artists WHERE id=\''.$id.'\'';
		$result = $db->query($sql);
		echo "'Delete successful'";
	} catch(PDOException $e){
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
	<title>Edit Artist</title>
	<link rel="stylesheet" type="text/css" href="index_files/style.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
    
    	<?php
            include_once('connection.php');

            $database = new Connection();
            $db = $database->open();
            $query = $_GET['q'];
            try{	
              $sql = 'SELECT * FROM artists WHERE id=\''.$query.'\'';
              foreach ($db->query($sql) as $row) {
                echo '<td>' .
            	    	'<center><img src = "data:image/png;base64,' . $row['portrait'] . '"/></center>'
            	    	. '</td>';
            }
        ?>
<table class="table">
<thead>
<th></th>
<th>Name</th>
<th>Lifespan</th>
<th>Thumbnail</th>
<th>Portrait</th>
<th>Style</th>
</thead>
		<tbody>
		  <?php
			  foreach ($db->query($sql) as $row) {
				echo '<tr><form action="" method="POST">';
            	echo '<td> <input type="text" hidden=true size=22 id="myid" name="id" value="' . $row['id'] . '"/> </td>';

            	echo '<td> <input type="text" size=22 id="myname" name="name" value="' . $row['name'] . '"/> </td>';
            	echo '<td> <input type="text" size=8 id="mylifespan" name="lifespan" value="' . $row['lifespan'] . '"/> </td>';
            	echo '<td> <label for="mythumbnail">Select a file:</label><input type="file" size=15 id="mythumbnail" name="thumbnail" value="' . $row['thumbnail'] . '"/> </td>';
				echo '<td> <label for="myportrait">Select a file:</label><input type="file" size=15 id="myportrait" name="portrait" value="' . $row['portrait'] . '"/> </td>';
				// echo '<td> <input type="text" size=10 id="mythumbnail" name="thumbnail" value="' . $row['thumbnail'] . '"/> </td>';	
				// echo '<td> <input type="text" size=10 id="myportrait" name="portrait" value="' . $row['portrait'] . '"/> </td>';	
            	echo '<td> <input type="text" size=10 id="mystyle" name="style" value="' . $row['style'] . '"/> </td>';	
				echo '<td> <input type="submit" size=10 name="update" value="Update"></form></td>';
            	echo '</tr>';
				
				echo '<tr> <form action="" method="POST">';
				echo '<div class="form-group">';
				echo '<td> <input type="search" hidden=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td></div>';
				echo '<td> <input type="submit" size=10 name="delete" value="Delete"></form></td>';			
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