<?php 
require_once 'connection.php';

$response['message'] = "";
$response['error'] = true;

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$id = $_POST['post_id'];
	$SQL = "DELETE FROM posts WHERE p_id = '$id' LIMIT 1";
	$query= mysqli_query($connection,$SQL);
	if($query)
	{
$response['message'] = "Post Deleted.";
		$response['error'] = false;
	}
	else
	{
		$response['message'] = "Error Occurred.";
		$response['error'] = true;
	}
}
else
{
		$response['message'] = "Invalid Request";
		$response['error'] = true;
}

echo json_encode($response);
?>