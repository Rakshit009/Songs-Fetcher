<?php

	header("Content-Type: application/json");
	header("Acess-Control-Allow-Origin: *");
	header("Acess-Control-Allow-Methods: POST");
	header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, Acess-Control-Allow-Methods, Authorization");

	$data = json_decode(file_get_contents("php://input"), true);

	$song_name = $data["song_name"];
	$artist_name = $data["artist_name"];
	$album_name = $data["album_name"];
	$release_year = $data["release_year"];
	$duration = $data["duration"];

	require_once "database.php";

	$art_ex = "SELECT * FROM `Artist` WHERE artist_name = '$artist_name'";
	$run = mysqli_query($conn,$art_ex);
		
		if(mysqli_num_rows($run)>0){

		}
		else{
			$art_ins = "INSERT INTO Artist(artist_name) VALUES('$artist_name')";
			$run = mysqli_query($conn,$art_ins);
			
		}

	$alb_ex = "SELECT * FROM `Album` WHERE album_name = '$album_name'";
	$run = mysqli_query($conn,$alb_ex);
		
		if(mysqli_num_rows($run)>0){

		}
		else{
			$alb_ins = "INSERT INTO Album(album_name) VALUES('$album_name')";
			$run = mysqli_query($conn,$alb_ins);
		}

		$get_art_id = "SELECT * FROM Artist WHERE artist_name = '$artist_name'";
		$get_art_run = mysqli_query($conn,$get_art_id);

		if(mysqli_num_rows($get_art_run)>0){
			$get_id = mysqli_fetch_assoc($get_art_run);
			$artist_id = $get_id['artist_id'];
		}
		else
		{
			echo "Error in Fetching Data";
		}

		$get_alb_id = "SELECT * FROM Album WHERE album_name = '$album_name'";
		$get_alb_run = mysqli_query($conn,$get_alb_id);

		if(mysqli_num_rows($get_alb_run)>0){
			$get_id = mysqli_fetch_assoc($get_alb_run);
			$album_id = $get_id['album_id'];
		}
		else
		{
			echo "Error in Fetching Data";
		}

	$query = "INSERT INTO Song(song_name,artist_id,album_id,release_year,Duration) 
	           VALUES ('$song_name','$artist_id','$album_id','$release_year','$duration')";

		if(mysqli_query($conn, $query) or die("Song Table Query Failed"))
		{
			echo json_encode(array("message"=>"Song Inserted Successfully","status"=>true)); 
		}
		else
		{
			echo json_encode(array("message"=>"Failed to Insert Song", "status"=>false)); 
		}

?>