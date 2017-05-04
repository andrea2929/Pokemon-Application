SELECT *
FROM moves m JOIN move_effect_prose mfp ON m.effect_id = mfp.move_effect_id
WHERE LCASE(m.identifier) LIKE LCASE(:name) AND mfp.local_language_id = 9
GROUP BY m.identifier
