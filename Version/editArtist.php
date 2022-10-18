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

    try {
        $sql = 'UPDATE artists 
				SET name=\''.$name.'\', lifespan=\''.$lifespan.'\', thumbnail=\''.$thumbnail.'\', portrait=\''.$portrait.'\', style=\''.$style.'\'  
				WHERE id=\''.$id.'\'';
        $result = $db->query($sql);
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
<th>Id</th>
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
				echo '<td> <input type="search" readonly=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> <input type="text" size=22 id="myname" name="name" value="' . $row['name'] . '"/> </td>';
            	echo '<td> <input type="text" size=1 id="mylifespan" name="lifespan" value="' . $row['lifespan'] . '"/> </td>';
            	echo '<td> <input type="text" size=10 id="mythumbnail" name="thumbnail" value="' . $row['thumbnail'] . '"/> </td>';
            	echo '<td> <input type="text" size=15 id="myportrait" name="portrait" value="' . $row['portrait'] . '"/> </td>';
            	echo '<td> <input type="text" size=10 id="mystyle" name="style" value="' . $row['style'] . '"/> </td>';	
				echo '<td> <input type="submit" size=10 name="update" value="Update"></form></td>';
            	echo '</tr>';
				
				echo '<tr> <form action="" method="POST">';
				echo '<div class=form-group">';
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