<?php 


$connection = mysqli_connect("localhost","root","","android_db");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
$response['message'] = "";
$response['error'] = true;

$name = $_POST['name'];

$SQL = "SELECT * FROM users WHERE NAME = '$name'";
$query = mysqli_query($connection,$SQL);
$rows = mysqli_num_rows($query);

if($rows > 0)
{
	$SQL = "DELETE FROM users WHERE NAME = '$name'";
	$query = mysqlI_query($connection,$SQL);
	if($query)
	{
		$response['message'] = "Value Deleted.";
		$response['error'] = false;
	}
	else
	{
		$response['message'] = "Value not deleted.";
		$response['error'] = true;
	}
}
else
{
$response['message'] = "No record Exist";
$response['error'] = true;
}

}
else
{
	$response['error'] = true;
}

echo json_encode($response);
?>