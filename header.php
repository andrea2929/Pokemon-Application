<?php
	include('config.php');
	include('functions.php');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

  <title>Pokedex</title>

	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://use.fontawesome.com/72e7f63cce.js"></script>

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php?search=&from=0">Pokedex</a>
		</div>

		<?php
			if(isset($_SESSION['userid'])) {
				echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="account.php">Profile</a></li>
		      </ul>';
			}
		?>

		<form class="navbar-form navbar-right" method="get" action="index.php?search=">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
			  <input type="search" class="form-control" name="search" placeholder="Search">
			</div>
		</form>

		<?php

			if(isset($_SESSION['userid'])) {
				echo '<button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='."'logout.php'".'">Logout</button>';
			}
			else {
				echo '<button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='."'login.php'".'">Login</button>';
			}

		?>

	</div>
</nav>
