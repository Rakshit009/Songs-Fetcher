<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th>Sr No</th>
      <th scope="col">Song Name</th>
      <th scope="col">Artist</th>
      <th scope="col">Album</th>
      <th scope="col">Release Year</th>
      <th scope="col">Duration</th>
    </tr>
  </thead>
  <tbody>
	<?php

	require_once "database.php";

	$query = "SELECT * FROM Song";

	$result = mysqli_query($conn, $query) or die("Select Query Failed.");
	$count = mysqli_num_rows($result);
	$i=1;


	if($count > 0)
	{ 
		while($row = mysqli_fetch_assoc($result)){

		  $artist_id = $row['artist_id'];
		  $album_id = $row['album_id'];


	      $artist_query = "SELECT * FROM Artist WHERE artist_id = '$artist_id'";
	      $artist_run = mysqli_query($conn,$artist_query);
	      $artist_row = mysqli_fetch_assoc($artist_run);

	      $album_query = "SELECT * FROM Album WHERE album_id = '$album_id'";
	      $album_run = mysqli_query($conn,$album_query);
	      $album_row = mysqli_fetch_assoc($album_run);

		  
		  echo "<tr>
				  <td scope=''>".$i++."</td>
				  <td scope=''>".$row['song_name']."</td>
				  <td colspan=''>".$artist_row['artist_name']."</td>
				  <td>".$album_row['album_name']."</td>
				  <td>".$row['release_year']."</td>
				  <td>".$row['Duration']."</td>
				</tr>";


		}

	}
	else
	{ 
	 	echo json_encode(array("message" => "No Product Found.", "status" => false));
	}

	?> 
  </tbody>
</table>
</div>
</body>
</html>
