<?php 
require_once 'connection.php';

$response['message'] = "";
$response['error'] = true;
$arr = array();
$response['user'] = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$SQL = "SELECT * FROM users WHERE email = '$email' AND password = '$pass' LIMIT 1";
	$query = mysqli_query($connection,$SQL);
	$rows = mysqli_num_rows($query);
	if($rows > 0)
	{
		$user = mysqli_fetch_object($query);
		$arr['username'] = $user->username;
		$arr['email'] = $user->email;
		$arr['id'] = $user->id;

		$response['user'] = $arr;
		$response['error'] = false;
		$response['message'] = "User Found";
		

	}
	else
	{
		$response['message'] = "User Credentials are incorrect.";
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