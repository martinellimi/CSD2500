<?php
error_reporting(E_ALL ^ E_DEPRECATED);

//$database = "myfilebox";
$database = "a4956688_filebox";

//Method to get a connection for the database
function getConnection() {
	//$host = 'localhost';
	$host = 'mysql1.000webhost.com';
	//$user = 'root';
	$user = 'a4956688_mybox';
	//$password = '';
	$password = 'myfilebox2014';
	error_reporting(E_ALL ^ E_DEPRECATED);
	$connection = mysql_connect($host, $user, $password);
	return $connection;
}

//Method to insert data in the database
function dbRowInsert($table_name, $form_data)
{
	global $database;
	
	$conn = getConnection();
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	$fields = array_keys($form_data);
	$sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
	mysql_select_db($database);
	
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	mysql_close($conn);
	
}

function selectFields($table_name, $form_data, $condition) 
{
	$conn = getConnection();
	
	$fields = array_keys($form_data);
	
	$sql = "SELECT ".implode(',', $fields)." FROM ".$table_name.$condition;

	global $database;
	
	mysql_select_db($database);
	
	$result = mysql_query( $sql, $conn );
	
	if (!$result) {
		echo "Could not execute query: $sql";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) {
		echo "No data found.";
		return;
	}
	
	$info = array();
	
	while ($row_user = mysql_fetch_array($result, MYSQL_ASSOC)){
		array_push($info, $row_user);
	}
	mysql_close($conn);
	
	return $info;
}

?>