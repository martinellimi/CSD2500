<?php

include 'ftp.php';

if($_SERVER['REQUEST_METHOD']=='GET')
{
	listFiles();
}
function listFiles() {
	$conn_id = getFTPConnection();
	
	session_start();
	$id = $_SESSION['ID'];
	
	$folder = "public_html/Files/".$id."/";
	
	$contents = array();
	
	ftp_pasv($conn_id, true);
	
	$contents = ftp_nlist($conn_id, $folder);
	
	echo json_encode($contents);
	
}


?>