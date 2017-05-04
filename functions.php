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

// Get function with specified default
function get($key, $default) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	else {
		return $default;
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

function query($database, $params, $sqlfile) {

	$sql = file_get_contents($sqlfile);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	return $results;

}

?>
