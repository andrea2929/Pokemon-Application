<?php

	include('header.php');

  $params = array(
    'id' => get('id')
  );

  $sql = file_get_contents('sql/getability.sql');
  $statement = $database->prepare($sql);
  $statement->execute($params);
  $ability = $statement->fetchAll(PDO::FETCH_ASSOC);

	$sql = file_get_contents('sql/getabilityprose.sql');
  $statement = $database->prepare($sql);
  $statement->execute($params);
  $prose = $statement->fetchAll(PDO::FETCH_ASSOC);

	$sql = file_get_contents('sql/getpokemonbyability.sql');
  $statement = $database->prepare($sql);
  $statement->execute($params);
  $pokemon = $statement->fetchAll(PDO::FETCH_ASSOC);

	$sql = file_get_contents('sql/getaveragebyability.sql');
  $statement = $database->prepare($sql);
  $statement->execute($params);
  $averages = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
  <h1 class="capitalize"><?php echo $ability[0]['identifier'] ?></h1>

	<div class="row">
		<div class="col-sm-6">
			<h3>Average Stats</h3>
			<?php foreach($averages as $average) : ?>
		  	<p><strong class="capitalize"><?php echo $average['identifier'] ?></strong>: <?php echo $average['base_stat'] ?></p>
			<?php endforeach; ?>

			<h3>Prose</h3>
			<?php foreach($prose as $p) : ?>
		  	<p><?php echo $p['effect']; ?></p>
			<?php endforeach; ?>
		</div>

		<div class="col-sm-6">
			<h3>Flavor Text</h3>
			<?php foreach($ability as $a) : ?>
		  	<p><strong class="capitalize"><?php echo $a['version'] ?></strong>: <?php echo $a['flavor_text'] ?></p>
			<?php endforeach; ?>
		</div>
	</div>

	<h2>Pokemon</h2>
	<div class="pokedex">
		<div class="row">
			<?php foreach($pokemon as $p) : $x = 0; ?>
				<?php if($x % 6 == 0 && $x != 0) { echo "</div><div class='row'>"; } $x+=1; ?>
				<div class='col-sm-2'>
					<a  style="display:block" href="pokemon.php?id=<?php echo $p['id']; ?>">
						<div class="pokedex-item">
							<div class="pokedex-item-info">
								<img src="images/icons/<?php echo $p['id']?>.png"><br>
								<?php echo $p['identifier']?>
							</div>
							<div class="pokedex-item-hover">
								<h2><?php echo $p['id']?></h2>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div>

<?php
  include('footer.php')
?>
