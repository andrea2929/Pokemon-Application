SELECT DISTINCT t.color as type, m.*, pm.*, pm.level as level, mep.*, MAX(pokemon_move_method_id)
FROM pokemon_moves pm
JOIN moves m ON pm.move_id = m.id
JOIN types t ON m.type_id = t.id
JOIN move_effect_prose mep ON m.effect_id = mep.move_effect_id
WHERE pm.pokemon_id = 1 AND pm.version_group_id = 16 AND mep.local_language_id = 9
GROUP BY m.identifier
ORDER BY pm.level
