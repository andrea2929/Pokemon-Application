<?php

	include('header.php');

	$pokemon = new Pokemon(get('id'), $database);

?>

<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-sm-10">
			<h1 style="text-transform: capitalize;"><div class="pokedex-number" <?php if($pokemon->getPokemon()['species_id']>99) {echo "style='width:70px; height:70px; padding: 15px 0;'"; } ?>><?php echo $pokemon->getPokemon()['species_id']; ?></div> <?php echo $pokemon->getPokemon()['identifier']; ?></h1>

			<img src="https://veekun.com/dex/media/pokemon/main-sprites/omegaruby-alphasapphire/<?php echo $pokemon->getPokemon()['id']; ?>.png">
			<img src="https://veekun.com/dex/media/pokemon/main-sprites/omegaruby-alphasapphire/shiny/<?php echo $pokemon->getPokemon()['id']; ?>.png"><br>
		</div>
		<div class="col-sm-2">
			<?php
	      if(isset($_SESSION['userid'])) {
	        $sql = file_get_contents('sql/getuserfavoritespokemon.sql');

	    		$params = array(
	    			'id' => $_SESSION['userid'],
	          'pokemon_id' => get('id')
	    		);

	    		$statement = $database->prepare($sql);
	    		$statement->execute($params);
	    		$favorite = $statement->fetchAll(PDO::FETCH_ASSOC);

	        if(empty($favorite)||$favorite[0]['is_favorite'] == 0) {
	          echo '<i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>';
	        } else {
	          echo '<i class="fa fa-heart fa-lg" aria-hidden="true"></i>';
	        }
	      }
	    ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
				<?php foreach($pokemon->getTypes() as $type): ?>
					<li class="list-group-item center" style="background-color: <?php echo $type['color'].' '; ?>;">
						<span class="capitalize">
							<strong><?php echo $type['identifier'].' '; ?></strong>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>

			<h3>Information</h3>
			<strong>Height</strong>: <?php echo $pokemon->getPokemon()['height']; ?><br>
			<strong>Weight</strong>: <?php echo $pokemon->getPokemon()['weight']; ?><br>
			<strong>Base Experience</strong>: <?php echo $pokemon->getPokemon()['base_experience']; ?><br>
			<strong>Order</strong>: <?php echo $pokemon->getPokemon()['order']; ?><br>
			<strong>Default</strong>: <?php echo $pokemon->getPokemon()['is_default']; ?><br>

			<h3>Base Statistics</h3>
			<?php foreach($pokemon->getStatistics() as $stat) : ?>
				<div class="row">
          <div class="col-md-6">
            <?php echo $stat['identifier']; ?>
          </div>
          <div class="col-md-6">
            <?php echo $stat['base_stat']; ?>
          </div>
        </div>
			<?php endforeach; ?>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
  			<div class="panel-heading">Abilities</div>
				<table class="table capitalize center">
					<?php foreach($pokemon->getAbilities() as $ability) : ?>
						<tr>
							<td>
								<a href="ability.php?id=<?php echo $ability['id']; ?>"><?php echo $ability['identifier']; ?></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="panel panel-default">
  			<div class="panel-heading">Flavor Text</div>
				<table class="table capitalize">
					<?php foreach($pokemon->getFlavorText() as $flavor): ?>
						<tr>
							<td>
								<?php echo $flavor['identifier']; ?>
							</td>
							<td>
						 		<?php echo $flavor['flavor_text']; ?>
						 	</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>



</div>

<?php include('footer.php'); ?>
