SELECT a.*, aft.*, v.identifier as 'version'
FROM abilities a JOIN ability_flavor_text aft on a.id = aft.ability_id JOIN versions v ON aft.version_group_id = v.version_group_id
WHERE a.id = :id
