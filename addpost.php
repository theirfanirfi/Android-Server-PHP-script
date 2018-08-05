<?php 
require_once 'connection.php';

$response['message'] = "";
$response['error'] = true;

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$user_id = $_POST['user_id'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$SQL = "INSERT INTO posts(post_title,post_text,user_id) VALUES('$title','$description','$user_id')";
	$query = mysqli_query($connection,$SQL);
	if($query)
	{
		$response['message'] = "Post Added.";
		$response['error'] = false;
	}
	else
	{
		$response['message'] = "Error occurred. Please try again later.";
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