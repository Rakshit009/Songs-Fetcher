<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$song_name = $data["song_name"];
$update_name = $data['update_name'];
$artist_name = $data["artist_name"];
$album_name = $data["album_name"];
$release_year = $data["release_year"];
$duration = $data["duration"];

require_once "database.php";

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

$query = "UPDATE `Song` SET `song_name`= '$update_name',`artist_id`= '$artist_id',`album_id`= '$album_id' WHERE `song_name` = '$song_name'";

if(mysqli_query($conn, $query) or die("Insert Query Failed"))
{
	echo json_encode(array("message"=>"Product Updated Successfully","status"=>true)); 
}
else
{
	echo json_encode(array("message"=>"Failed Product Not Inserted ", "status"=>false)); 
}

?>
