SELECT *
FROM pokemon_species AS ps
WHERE ps.evolution_chain_id = (SElECT evolution_chain_id FROM pokemon_species WHERE id = :id)
