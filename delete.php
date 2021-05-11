<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: DELETE");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, 
Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$song_name = $data["song_name"];

require_once "database.php";

echo $query = "DELETE FROM Song WHERE `song_name` = '".$song_name."'";

if(mysqli_query($conn, $query) or die("Delete Query Failed"))
{ 
	echo json_encode(array("message" =>"Song Deleted Successfully", "status" =>true)); 
}
else
{ 
	echo json_encode(array("message" =>"Failed to Delete Song", "status" =>false)); 
}

?>;