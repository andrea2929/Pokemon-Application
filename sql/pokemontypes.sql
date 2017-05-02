SELECT identifier, color
FROM pokemon_types ps JOIN types t ON ps.type_id = t.id
WHERE ps.pokemon_id = :id
ORDER BY ps.slot
