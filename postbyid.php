<?php 
require_once 'connection.php';

$response['message'] = "";
$response['error'] = true;

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$id = $_POST['post_id'];
	$SQL = "SELECT * FROM posts WHERE p_id= '$id'";

	$query= mysqli_query($connection,$SQL);
	$obj = mysqli_fetch_object($query);
	$response['post_title'] = $obj->post_title;
	$response['text'] = $obj->post_text;
	$response['date'] = $obj->created_date;
		$response['error'] = false;
}
else
{
		$response['message'] = "Invalid Request";
		$response['error'] = true;
}

echo json_encode($response);
?>