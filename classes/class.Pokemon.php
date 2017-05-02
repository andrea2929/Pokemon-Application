<?php

class Pokemon {
	private $id;
	private $database;
	private $pokemon;
	private $statistics;
	private $abilities;
	private $types;
	private $moves;

	public function __construct($pokeid, $db) {
		$this->id = $pokeid;
		$this->database = $db;

		$this->findPokemon();
		$this->findStatistics();
		$this->findAbilities();
		$this->findTypes();
		$this->findMoves();
	}

	public function findPokemon() {
		$params = array(
			'id' => $this->id
		);

		$sql = file_get_contents('sql/getpokemon.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
		$pokemon = $statement->fetchAll(PDO::FETCH_ASSOC);
		$this->pokemon = $pokemon[0];
	}

	public function findStatistics() {
		$params = array(
			'id' => $this->id
		);

		$sql = file_get_contents('sql/getstatistics.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
		$this->statistics = $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findAbilities() {
		$params = array(
			'id' => $this->id
		);

		$sql = file_get_contents('sql/getabilities.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
		$this->abilities = $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findTypes() {
		$params = array(
			'id' => $this->id
		);

		$sql = file_get_contents('sql/pokemontypes.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
		$this->types = $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findMoves() {
		$params = array(
			'id' => $this->id
		);

		$sql = file_get_contents('sql/getpokemonmoves.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
		$this->moves = $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPokemon() {
		return $this->pokemon;
	}

	public function getStatistics() {
		return $this->statistics;
	}

	public function getAbilities() {
		return $this->abilities;
	}

	public function getTypes() {
		return $this->types;
	}

	public function getMoves() {
		return $this->moves;
	}

	public function getFlavorText() {
		$params = array(
			'id' => $this->id
		);

		$sql = file_get_contents('sql/pokemonflavortext.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>
