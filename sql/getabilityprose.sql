SELECT *
FROM abilities a
JOIN ability_prose ap ON a.id = ap.ability_id
WHERE a.id = :id AND local_language_id = 9
