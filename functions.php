<?php

// Get function
function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	else {
		return '';
	}
}

function favorite($user_id, $pokemon_id) {
	$sql = file_get_contents('sql/favoritepokemon.sql');

	$params = array(
		'user_id' => $user_id,
		'pokemon_id' => $pokemon_id
	);

	$statement = $database->prepare($sql);
	$statement->execute($params);
}

?>
