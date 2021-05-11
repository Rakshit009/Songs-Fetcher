
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
    <a class="navbar-brand" href="search.php" style="font-size: 24px">Songs Fetcher</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="search.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container my-4" style="color:white">
	<?php 

	include("database.php");

	  if(isset($_GET['song_name']))
	  {
	    $name = $_GET['song_name'];
	    $get_query = "SELECT * FROM `Song` where `song_name` = '$name'";
	    $get_run = mysqli_query($conn,$get_query);
	    if(mysqli_num_rows($get_run) > 0)
      {
          $product_row = mysqli_fetch_assoc($get_run);
          $song_name = ucfirst($product_row['song_name']);
          $song = $product_row['song_name'];
          $artist_id = $product_row['artist_id'];
          $album_id = $product_row['album_id'];
          $release_year = ucfirst($product_row['release_year']);
          $duration = ucfirst($product_row['Duration']);

          $artist_query = "SELECT * FROM Artist WHERE artist_id = '$artist_id'";
          $artist_run = mysqli_query($conn,$artist_query);
          $artist_row = mysqli_fetch_assoc($artist_run);

          $album_query = "SELECT * FROM Album WHERE album_id = '$album_id'";
          $album_run = mysqli_query($conn,$album_query);
          $album_row = mysqli_fetch_assoc($album_run);

          $string = str_replace(' ', '', $name);
          $image = $string.".jpg";

          echo "<img src='".$image."' width='500px'><br><br>";

          echo "Song - <h1>".$song_name."</h1>";

          echo "Artist - <h2>".$artist_row['artist_name']."</h2>";

          echo "Album - <h3>".$album_row['album_name']."</h3>";

          echo "Release: ".$release_year." | Duration: ".$duration." sec <br><br>";  

          echo '<audio controls >
            <source src="'.$string.'.ogg" type="audio/ogg">
            <source src="'.$string.'.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
          </audio>';
      }
      else{
        echo "<h2 style='color:white'>Song Not Found</h2>";
      }

	  }
	?>  
  </div>

</body>
</html>





