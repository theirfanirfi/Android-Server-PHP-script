<?php 


$connection = mysqli_connect("localhost","root","","android_db");
$response['name'] = "";
$response['message'] = "";
$response['error'] = true;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = $_POST['name'];

	$SQL = "INSERT INTO users(NAME) VALUES('$name')";
	$query = mysqli_query($connection,$SQL);
	if($query)
	{
	$response['message'] = "Value inserted";
	$response['error'] = false;
	}

	else
	{
	$response['message'] = "Error occurred in inserting the value. pLEASE TRY AGAIN.";
	$response['error'] = true;
	}

}
else
{
	$response['error'] = true;
}

echo json_encode($response);
?>