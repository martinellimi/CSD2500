<?php

include 'dataBaseConnection.php';
include 'ftp.php';
error_reporting(E_ALL ^ E_DEPRECATED);

$folder_name = "public_html/Files";

uploadFile();

function uploadFile() {

	error_reporting(E_ALL | E_STRICT);
	require('UploadHandler.php');
	$upload_handler = new UploadHandler();

	$files = scandir("files", 1);
	
	$filename = $files[0];
	$dir = "files/";
	$file = $dir.$filename;//tobe uploaded
	session_start();
	$remote_file = "public_html/Files/".$_SESSION["ID"]."/".$filename;

	$ftpConnection = getFTPConnection();

	// turn passive mode on
	ftp_pasv($ftpConnection, true);

	// upload a file
	if (!ftp_put($ftpConnection, $remote_file, $file, FTP_ASCII)) {
		echo "There was a problem while uploading $file\n";
		exit;
	}

	insertFileDatabase($file, false);

	if(is_file($file)){
		unlink($file);
	}

	// close the connection
	ftp_close($ftpConnection);
}

function insertFileDatabase($file, $isFile) {

	echo $file;

	$ext = pathinfo($file, PATHINFO_EXTENSION);

	$mime = mime_content_type($file);

	date_default_timezone_set("Europe/London");
	
	$dateTime = date('Y-m-d H:i:s');

	$fileName = basename($file);

	$isFolder = $isFile == true ? 0 : 1;

	echo $isFolder;
	echo $dateTime;

	$form_data = array(
			'NAME' => $fileName,
			'ISFOLDER' => $isFolder,
			'EXTENSION' => $ext,
			'MIMETYPE' => $mime,
			'MODIFIED' => $dateTime
	);

	dbRowInsert('FILE', $form_data);
}
?>
