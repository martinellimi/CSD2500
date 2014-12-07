<?php

include 'dataBaseConnection.php';
include 'ftp.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$pass = strval($_POST["password"]);
	
	$password = encriptPassword($pass);
	
	$form_data = array(
			'FIRST_NAME' => $_POST["firstName"],
			'SURNAME' => $_POST["surname"],
			'EMAIL' => $_POST["email"],
			'PASSWORD' => $password,
			'ID' => ""
	);
	
 	dbRowInsert('User', $form_data);
 	
 	$email = $_POST["email"];
 	
 	$where = " WHERE EMAIL = '$email';";
 	$data = array();
 	$data = selectFields("User", $form_data, $where);
 	
 	$ID = $data[0]["ID"];
 	
 	if(sizeof($data) == 1) {
 		createFolderForUser($ID);
 		
	 	session_start();
	 	$_SESSION['user_name'] = $data[0]["FIRST_NAME"]." ".$data[0]["SURNAME"];
	 	$_SESSION['ID'] = $ID;
 	} else {
 		echo "Error! More than one user found.";
 	}

}

function encriptPassword($myPassword) {
	//Salt my password, I am adding a string to my password.
	$hash = crypt($myPassword, 'ml');
	
	return $hash;
}