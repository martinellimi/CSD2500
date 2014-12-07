<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../styles/layout.css" />
	<link rel="stylesheet" href="../styles/bootstrap.css" />
	<link href="../styles/jquery-1.10.4/theme/jquery-ui-1.10.4.custom.css" rel="stylesheet" />
	<link rel="stylesheet" href="../styles/jquery-file-upload/css/jquery.fileupload.css" />
	<link rel="stylesheet" href="../styles/jquery-file-upload/css/jquery.fileupload-ui.css" />
	<script src="../styles/jquery-1.10.4/theme/jquery-1.10.2.js"></script>
	<script src="../styles/jquery-1.10.4/theme/jquery-ui.js"></script>
	<script src="../scripts/bootstrap.min.js"></script>
	<meta charset="UTF-8">

	<title>My FileBox</title>
</head>
<body>
	<div id="siteHolder">
		<div
			style="height: 20px; width: 100%; position: fixed; z-index: 999; background-image: url('../images/wallpaper-white.png');">
			<div style="display: inline;">
				<img src="../images/logoBox.png" style="height: 100px;"></img>
			</div>
			<div style="display: inline;">
				<img src="../images/logo.png" style="height: 40px;"></img>
			</div>
		</div>
		<div id="pageHeader">
			<div class="userInfo">
				<div style="display: inline">
					<span><?php echo $_SESSION["user_name"] ?></span>&nbsp; <img src="../images/avatar.png"
						alt="Usuário" style="text-align: center; display: inline" />
				</div>
			</div>
			<div class="options">
				<div style="cursor: pointer;">
					<a href="settings.html"><span class="glyphicon glyphicon-cog"
						style="color: black; cursor: pointer; margin-top: 15px; margin-left: 10px;"></span><span
						style="margin-left: 10px;">Settings</span></a>
				</div>
				<div style="cursor: pointer;">
					<a href="logOut.php"><span class="glyphicon glyphicon-log-out"
						style="color: black; cursor: pointer; margin-top: 15px; margin-left: 10px;"></span><span
						style="margin-left: 10px;">Log out</span></a>
				</div>
			</div>
		</div>
		<div id="mainContent">
			<div id="fileContent">