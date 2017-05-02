SELECT *
FROM pokemon_moves pm JOIN moves m ON pm.move_id = m.id
WHERE pm.pokemon_id = :id
