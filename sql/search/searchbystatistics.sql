SELECT *
FROM pokemon p JOIN pokemon_stats ps ON p.id = ps.pokemon_id
JOIN stats s ON ps.stat_id = s.id
WHERE s.identifier = 'hp' AND ps.base_stat > :hp
