<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Main</title>

	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-colorpicker.min.css">
</head>
<body>
	<?php
		if ( !empty($_SESSION['error']) )
			require_once('partials/error.php');
	?>