<?php 
require_once 'connection.php';

$response['message'] = "";
$response['error'] = true;
$ids = array();
$titles = array();
$text = array();
$dates = array();
$response['ids'] = "";
	$response['titles'] = "";
	$response['text'] = "";
	$response['date'] = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$user_id = $_POST['user_id'];

	$SQL = "SELECT * FROM posts WHERE user_id = '$user_id'";
	$query = mysqli_query($connection,$SQL);
	$rows = mysqli_num_rows($query);
	if($rows > 0){
	while($row = mysqli_fetch_object($query))
	{
		$ids[] =$row->p_id;
		$titles[] = $row->post_title;
		$text[] = $row->post_text;
		$dates[] = $row->created_date;
	}

	$response['ids'] = $ids;
	$response['titles'] = $titles;
	$response['text'] = $text;
	$response['error'] = false;
	$response['date'] = $dates;

}else
{
	$response['message'] = "You haven't posted yet.";
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