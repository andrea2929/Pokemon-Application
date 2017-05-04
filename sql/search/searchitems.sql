SELECT i.*, MAX(ift.version_group_id), ift.flavor_text
FROM items i JOIN item_flavor_text ift ON i.id = ift.item_id
WHERE LCASE(i.identifier) lIKE LCASE(:name) AND ift.language_id = 9
GROUP BY i.identifier
