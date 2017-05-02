<?php
	include('config.php');
	include('functions.php');

	if($current_url=='abilities.php'||$current_url=='items.php'||$current_url=='moves.php'||$current_url=='statistics.php'){
		$urlset = '../';
	}
	else {
		$urlset = '';
	}

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
			<a class="navbar-brand" href="<?php echo $urlset; ?>index.php?search=&from=0">Pokedex</a>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lookup<span class="caret"></span></a>
					<ul class="dropdown-menu">
            <li><a href="<?php echo $urlset; ?>search/abilities.php">Ability</a></li>
            <li><a href="<?php echo $urlset; ?>search/items.php">Item</a></li>
            <li><a href="<?php echo $urlset; ?>search/moves.php">Move</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo $urlset; ?>search/statistics.php">Statistics</a></li>
          </ul>
        </li>
				<?php
					if(isset($_SESSION['userid'])) {
						echo '<li><a href="'.$urlset.'account.php">Profile</a></li>
									<li><a href="#">Team Builder</a></li>';
					}
				?>
			</ul>

		<form class="navbar-form navbar-right" method="get" action="<?php echo $urlset; ?>index.php?search=">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
			  <input type="search" class="form-control" name="search" placeholder="Search">
			</div>
		</form>

		<?php

			if(isset($_SESSION['userid'])) {
				echo '<button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='."'".$urlset."logout.php'".'">Logout</button>';
			}
			else {
				echo '<button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='."'".$urlset."login.php'".'">Login</button>';
			}

		?>

		</div>
	</div>
</nav>
