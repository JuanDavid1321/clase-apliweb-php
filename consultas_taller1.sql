CREATE TABLE tbl_actor (
    id_actor INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
);

CREATE TABLE tbl_actor_pelicula (
    id_actor_pelicula INT PRIMARY KEY,
    id_actor INT NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_actor) REFERENCES tbl_actor(id_actor),
    FOREIGN KEY (titulo) REFERENCES tbl_pelicula(titulo)
);

SELECT titulo, genero, director, nombre
FROM tbl_pelicula
LEFT JOIN tbl_pais
ON tbl_pais.id_pais = tbl_pelicula.id_pais_fk;


SELECT titulo, genero, director, nombre
FROM tbl_pelicula
RIGHT JOIN tbl_pais
ON tbl_pais.id_pais = tbl_pelicula.id_pais_fk;


SELECT tbl_pelicula.titulo, tbl_pelicula.genero, tbl_pelicula.director, tbl_actor.nombre, tbl_actor.apellido
FROM tbl_pelicula
INNER JOIN tbl_actor_pelicula 
ON tbl_pelicula.titulo = tbl_actor_pelicula.titulo
INNER JOIN tbl_actor 
ON tbl_actor.id_actor = tbl_actor_pelicula.id_actor
WHERE 
    tbl_actor.nombre = 'Ricardo' 
    AND 
    tbl_pelicula.genero = 'Thriller';

-- ***************************************************************************************************************************
-- DB AERONAVES
CREATE DATABASE aeronaves_db;

CREATE TABLE aeronaves (
    id_aeronave INT PRIMARY KEY,
    modelo VARCHAR(50) NOT NULL,
    fabricante VARCHAR(50),
    capacidad_pasajeros INT NOT NULL
);

CREATE TABLE aeropuertos (
    nombre VARCHAR(100) PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL
);

CREATE TABLE vuelos (
    id_vuelo INT PRIMARY KEY,
    ruta VARCHAR(100) NOT NULL,
    fecha_salida DATETIME NOT NULL,
    fecha_llegada DATETIME NOT NULL
);

CREATE TABLE aeronaves_aeropuertos (
    id_aeronave INT NOT NULL,
    nombre_aeropuerto VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_aeronave) REFERENCES aeronaves(id_aeronave),
    FOREIGN KEY (nombre_aeropuerto) REFERENCES aeropuertos(nombre)
);

CREATE TABLE aeronaves_vuelos (
    id_aeronave INT NOT NULL,
    id_vuelo INT NOT NULL,
    FOREIGN KEY (id_aeronave) REFERENCES aeronaves(id_aeronave),
    FOREIGN KEY (id_vuelo) REFERENCES vuelos(id_vuelo)
);


INSERT INTO aeronaves (id_aeronave, modelo, fabricante, capacidad_pasajeros) 
VALUES  (1, 'Boeing 737', 'Boeing', 189),
        (2, 'Airbus A320', 'Airbus', 186),
        (3, 'Boeing 787', 'Boeing', 330);

INSERT INTO aeropuertos (nombre, ciudad, pais) 
VALUES  ('Aeropuerto Internacional de Los Angeles', 'Los Angeles', 'Estados Unidos'),
        ('Aeropuerto Internacional de Heathrow', 'Londres', 'Reino Unido'),
        ('Aeropuerto Internacional de Dubai', 'Dubai', 'Emiratos Árabes Unidos');

INSERT INTO vuelos (id_vuelo, ruta, fecha_salida, fecha_llegada) 
VALUES  (1, 'LAX - LHR', '2024-05-01 08:00:00', '2024-05-01 15:00:00'),
        (2, 'LHR - DXB', '2024-05-02 10:00:00', '2024-05-02 20:00:00'),
        (3, 'DXB - LAX', '2024-05-03 12:00:00', '2024-05-03 22:00:00');

INSERT INTO aeronaves_aeropuertos (id_aeronave, nombre_aeropuerto) 
VALUES  (1, 'Aeropuerto Internacional de Los Angeles'),
        (2, 'Aeropuerto Internacional de Heathrow'),
        (3, 'Aeropuerto Internacional de Dubai'),
        (1, 'Aeropuerto Internacional de Heathrow'),
        (2, 'Aeropuerto Internacional de Dubai'),
        (3, 'Aeropuerto Internacional de Los Angeles');

INSERT INTO aeronaves_vuelos (id_aeronave, id_vuelo) 
VALUES  (1, 1),
        (2, 2),
        (3, 3),
        (1, 3),
        (2, 1),
        (3, 2);


-- Mostrar la cantidad de vuelos realizados por la aeronave con modelo Boeing 737
SELECT 
    aeronaves.modelo,
    COUNT(aeronaves_vuelos.id_vuelo) AS "Vuelos realizados"
FROM aeronaves 
INNER JOIN aeronaves_vuelos 
ON aeronaves.id_aeronave = aeronaves_vuelos.id_aeronave
WHERE aeronaves.modelo = 'Boeing 737';

-- Mostrar la cantidad de personas que recibe el Aeropuerto internacional de Dubai con los registros actuales
SELECT 
    aeropuertos.nombre,
    SUM(aeronaves.capacidad_pasajeros) as "Cantidad total de personas que ha recibido hasta ahora"
FROM  aeropuertos 
INNER JOIN aeronaves_aeropuertos
ON aeropuertos.nombre = aeronaves_aeropuertos.nombre_aeropuerto
INNER JOIN aeronaves
ON aeronaves_aeropuertos.id_aeronave = aeronaves.id_aeronave
WHERE aeropuertos.nombre = "Aeropuerto Internacional de Dubai";

-- Mostrar la cantidad de aeronaves por fabricante que tienen asignados vuelos con una duración mayor a 8 horas
SELECT 
    aeronaves.fabricante,
    COUNT(DISTINCT aeronaves_vuelos.id_aeronave) AS "Cantidad de aeronaves"
FROM aeronaves
INNER JOIN aeronaves_vuelos 
ON aeronaves.id_aeronave = aeronaves_vuelos.id_aeronave
INNER JOIN vuelos 
ON aeronaves_vuelos.id_vuelo = vuelos.id_vuelo
WHERE TIMESTAMPDIFF(HOUR, vuelos.fecha_salida, vuelos.fecha_llegada) > 8
GROUP BY aeronaves.fabricante;



-- ***************************************************************************************************************************
SELECT 
    pokemon.pok_id,
    pokemon.pok_name AS "Nombre del pokemon",  
    base_stats.b_atk AS "Puntos de ataque",
    base_stats.b_def AS "Puntos de defensa",
    base_stats.b_hp AS "Puntos de vida"
FROM pokemon
INNER JOIN base_stats
ON pokemon.pok_id = base_stats.pok_id
WHERE b_atk > 100
AND b_def > 100
AND b_hp > 100;


SELECT COUNT(types.type_id)
AS "Cantidad de pokemones tipo: Dragon"
FROM pokemon
INNER JOIN pokemon_types
ON pokemon_types.pok_id = pokemon.pok_id
INNER JOIN types
ON types.type_id = pokemon_types.type_id
WHERE types.type_name = "Dragon";


SELECT AVG(base_stats.b_atk)
AS "Promedio de nivel de ataque de los pokemones de habitat pradera con nivel de ataque mayor a 100 puntos"
FROM pokemon
INNER JOIN base_stats
ON base_stats.pok_id = pokemon.pok_id
INNER JOIN pokemon_evolution_matchup
ON pokemon_evolution_matchup.pok_id = pokemon.pok_id
INNER JOIN pokemon_habitats
ON pokemon_habitats.hab_id = pokemon_evolution_matchup.hab_id
WHERE pokemon_habitats.hab_name = "grassland"
AND base_stats.b_atk > 100;