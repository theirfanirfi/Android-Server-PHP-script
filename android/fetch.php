<?php 


$connection = mysqli_connect("localhost","root","","android_db");
$response['name'] = "";
$response['message'] = "";
$response['error'] = true;
$names = array();
$response['names'] = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	
	$SQL = "SELECT * FROM users";
	$query = mysqli_query($connection,$SQL);
	while($r = mysqli_fetch_object($query))
	{
		$names[] = $r->NAME;
	}

	$response['names'] = $names;
	$response['error'] = false;

}
else
{
	$response['error'] = true;
}

echo json_encode($response);
?>