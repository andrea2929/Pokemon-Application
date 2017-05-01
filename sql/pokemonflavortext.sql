SELECT *
FROM pokemon_species_flavor_text pfa join versions v on pfa.version_id = v.id
WHERE species_id = :id AND language_id = 9
