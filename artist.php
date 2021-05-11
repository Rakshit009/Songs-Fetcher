<!DOCTYPE html>
<html>
<head>
  <title>Songs_Fetcher</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
<style type="text/css">
.customized{
  border:1px solid white; 
  width: 100px;
  color:white;
  font-size: 18px;
}
.customized:hover{
  background-color: white;
  color:#465754;
}
</style>
</head>
<body style="background-color: #465754;font-family: 'Itim', cursive;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" style="font-size: 24px">Songs Fetcher</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>



	<?php

		include("database.php");

		if(isset($_GET['artist_name'])){

			$name = $_GET['artist_name'];
			$query = "SELECT * FROM Artist WHERE artist_name = '$name'";
			$run = mysqli_query($conn,$query);

			if(mysqli_num_rows($run)>0){
				$artist_row =  mysqli_fetch_assoc($run);
				$id = $artist_row['artist_id'];
				$fetch_songs = "SELECT * FROM Song WHERE artist_id = '$id'";
				$fetch_query = mysqli_query($conn,$fetch_songs);
				while($row = mysqli_fetch_assoc($fetch_query)){
					$song_name = $row['song_name'];
					$release_year = $row['release_year'];
					$duration = $row['Duration'];
				    $string = str_replace(' ', '', $song_name);
				    $image = $string.".jpg";			
					echo'
          <div class="col-md-4" style="float:left;margin-top:5%">
					<div class="card" style="width: 18rem;">
					  <img src="'.$image.'">
					  <div class="card-body">
					    <h5 class="card-title">'.$song_name.'</h5>
					    <p class="card-text">Release Year: '.$release_year.' | Duration: '.$duration.'</p>
					    <a href="songs.php?song_name='.$song_name.'" class="btn btn-primary">open</a>
					  </div>
            </div>
					</div>';

				}
			}

		}

	?>

</body>
</html>

