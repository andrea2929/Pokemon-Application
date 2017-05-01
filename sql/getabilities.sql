SELECT *
FROM pokemon_abilities pa join abilities a on pa.ability_id = a.id
WHERE pokemon_id = :id
ORDER BY is_hidden DESC
