SELECT s.identifier, ROUND(AVG(ps.base_stat)) as base_stat
FROM pokemon_abilities pa
JOIN pokemon p ON pa.pokemon_id = p.id
JOIN pokemon_stats ps ON p.id = ps.pokemon_id
JOIN stats s ON ps.stat_id = s.id
WHERE pa.ability_id = :id
GROUP BY s.identifier
