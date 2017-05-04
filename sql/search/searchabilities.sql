SELECT a.*, MAX(aft.version_group_id), aft.flavor_text
FROM abilities a
JOIN ability_flavor_text aft on a.id = aft.ability_id
WHERE LCASE(a.identifier) like LCASE(:name) AND aft.language_id = 9
GROUP BY a.identifier
