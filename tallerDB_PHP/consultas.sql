-- Consulta general
SELECT 
    pokemon.pok_id, 
    pokemon.pok_name, 
    pokemon.pok_height, 
    pokemon.pok_weight, 
    pokemon.pok_base_experience,
    base_stats.b_hp,
    base_stats.b_atk,
    base_stats.b_def,
    pokemon_types.slot,
    types.type_name
FROM pokemon
JOIN base_stats 
ON base_stats.pok_id = pokemon.pok_id 
JOIN pokemon_types 
ON pokemon.pok_id = pokemon_types.pok_id 
JOIN types 
ON types.type_id = pokemon_types.type_id
ORDER BY pokemon.pok_id;

-- Eliminar un pokemon
DELETE
FROM pokemon
WHERE pok_id = 1;