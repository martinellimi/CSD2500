<?php 

$ftp_user_name="a4956688";
$ftp_user_pass="MILENALOPES07";
$folder_name = "public_html/Files";

function getFTPConnection() {
	$ftp_server="ftp.myfilebox.web44.net";
	$conn_id = ftp_connect($ftp_server);
	
	global $ftp_user_name, $ftp_user_pass;
	
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	
	if(!$login_result) {
		echo  "Connection Error!";
	} else {
	}
	
	return $conn_id;
}

function createFolder($folderName, $userID) {
	$ftpConnection = getFTPConnection();
	
	global $folder_name;
	
	$dir = $folder_name.$userID."/".$folderName;
	
	// try to create the directory $dir
	if (!ftp_mkdir($ftpConnection, $dir)) {
		echo "There was a problem while creating $dir\n";
	}
	
	ftp_close($conn_id);
}

function createFolderForUser($userID) {
	$ftpConnection = getFTPConnection();
	
	global $folder_name;
	
	ftp_pasv($ftpConnection, true);
	
	if (!ftp_mkdir($ftpConnection, $folder_name."/".$userID)) {
		echo "There was a problem while creating $dir\n";
	}
	
	ftp_close($ftpConnection);
}


?>