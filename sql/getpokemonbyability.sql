SELECT *
FROM pokemon p JOIN pokemon_abilities pa ON p.id = pa.pokemon_id
WHERE pa.ability_id = :id
