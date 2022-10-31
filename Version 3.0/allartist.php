<!DOCTYPE html>

<!--
 * Zac Purkiss 
 * P444025
 * 09.08.2022
-->
 
<html>
<title> All Artists </title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">	
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
    <form action="searchartists.php">
      <div class="form-group">
        <input 
          type="search" 
          id="mysearch"
          name="q"
          placeholder="Search"
          />
      <button type="submit" class="btn btn-default">Submit</button>
     </form>
    </div>
	 <table class="table">
	    <thead>
		  <th>ID</th>
		  <th>Artist Name</th>
		  <th>Image</th>
		  <th>Life Span</th>
		  <th>Style</th>	
	    </thead>
		<tbody>
		  <?php
		   include_once('connection.php');

            $database = new Connection();
            $db = $database->open();    
			try{	
			  $sql = 'SELECT * FROM artists';
			  foreach ($db->query($sql) as $row) {				
				echo '<tr> <form action="editArtist.php">';
              		echo '<div class=form-group">';
              		echo '<td> <input type="search" readonly=true size=1 id="myid" name="q" value="' . $row['id'] . '"/> </td>';          		
            		echo '<td>' . $row['name'] . '</td>';
					echo '<td>' . '<img src = "data:image/png;base64,' . $row['thumbnail'] . '" height = "100px"/>' . '</td>';
            		echo '<td>' . $row['lifespan'] . '</td>';            		
					echo '<td>' . $row['style'] . '</td>';
					echo '<td> <button type="submit" class="btn btn-default">Edit</button></form> </td>';	
            	echo '</tr>';

			  }
			}
			catch(PDOException $e){
			  echo "'ruh roh' - scooby doo";
			}
			
		?>		
	</tbody>
     </table>
		  <?php

			$database->close();

			  ?>
			<tr> 
            <form action="createArtist.php">
					<div class="form-group">
						<td> <button type="submit" class="btn btn-default">Create New</button></td>
					</div>
            </form>
        </tr>
	</div>
</body>
</html>