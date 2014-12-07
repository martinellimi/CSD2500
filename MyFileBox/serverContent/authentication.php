<?php
include 'dataBaseConnection.php';

function encriptPassword($myPassword) {
	$hash = crypt($myPassword, 'ml');
	
	return $hash;
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	authentication($_POST["email"], $_POST["password"]);
}

function authentication($user, $password) {
	
	$form_data = array(
			'EMAIL' => $user,
			'PASSWORD' => $password,
			'FIRST_NAME' => "",
			'SURNAME' => "",
			'ID' => ""
	);
	
	$where = " WHERE EMAIL = '$user';";
	$data = array();
	$data = selectFields("User", $form_data, $where);
	
	if(sizeof($data) == 1) {
		if(!validatePassword($password, $data[0]["PASSWORD"])) {
			echo "Invalid Password";
		} else {
			session_start();
			$_SESSION['user_name'] = $data[0]["FIRST_NAME"]." ".$data[0]["SURNAME"];
			$_SESSION['ID'] = $data[0]["ID"];
		}
	}
}

function validatePassword($password, $passwordEncrypted) {
	$hashPassword = crypt($password, "ml");
	if($passwordEncrypted == $hashPassword){
		return true;
	}
	
	return false;
}
