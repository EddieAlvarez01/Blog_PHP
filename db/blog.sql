CREATE TABLE Usuario(
	id INT(255) AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_registro DATE NOT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

CREATE TABLE Categoria(
	id INT(255) AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT pk_categoria PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE Entrada(
	id INT(255) AUTO_INCREMENT,
    usuario_id INT(255) NOT NULL,
    categoria_id INT(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descripcion MEDIUMTEXT,
    fecha DATE NOT NULL,
    CONSTRAINT pk_entrada PRIMARY KEY(id),
    CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE,
    CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES Categoria(id) ON DELETE CASCADE
)ENGINE=InnoDB;

#INSERTS PARA USUARIO#
INSERT INTO Usuario(nombre, apellidos, email, password, fecha_registro)
VALUES('Fernando', 'Llorente', 'fernando@fernando.com', '123', '2017-08-22');
INSERT INTO Usuario(nombre, apellidos, email, password, fecha_registro)
VALUES('Luisa', 'Avila', 'luisa@luisa.com', '123', '2018-10-15');
INSERT INTO Usuario(nombre, apellidos, email, password, fecha_registro)
VALUES('Samuel', 'Salcido', 'samuel@samuel.com', '123', '2019-08-22');

#INSERTS PARA CATEGORIA#
INSERT INTO Categoria(nombre)
VALUES('Acción');
INSERT INTO Categoria(nombre)
VALUES('Rol');
INSERT INTO Categoria(nombre)
VALUES('Deportes');
INSERT INTO Categoria(nombre)
VALUES('Rpg');

#INSERTS PARA ENTRADA#
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(1, 1, 'Novedades del GTA V online', 'Review del gta v', CURDATE());
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(1, 2, 'Novedades del LOL online', 'Todo sobre el LOL', CURDATE());
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(1, 3, 'Nuevos jugadores de fifa 19', 'Review del fifa 19', CURDATE());

INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(3, 1, 'Novedades del Assasins online', 'Review del assasins', CURDATE());
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(3, 2, 'Novedades del WOW online', 'Todo sobre el WOW', CURDATE());
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(3, 3, 'Nuevos jugadores de PES 19', 'Review del PES 19', CURDATE());

INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(4, 1, 'Novedades del Call of Duty online', 'Review del Call of duty', CURDATE());
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(4, 1, 'Novedades del Fornite online', 'Todo sobre el Fornite', CURDATE());
INSERT INTO Entrada(usuario_id, categoria_id, titulo, descripcion, fecha)
VALUES(4, 3, 'Nuevos jugadores de Formula 1 2k20', 'Review del Formula 1 2k20', CURDATE());

SELECT usr.nombre AS 'Nombre', usr.apellidos AS 'Apellidos'
FROM Entrada e
INNER JOIN Usuario usr ON usr.id = e.usuario_id
WHERE e.titulo LIKE '%GTA%';

SELECT e.*
FROM Entrada e
INNER JOIN Categoria c ON c.id = e.categoria_id
WHERE c.nombre = 'acción';

#MOSTRAR LAS CATEGORIAS CON 3 O MAS ENTRADAS#
SELECT *
FROM Categoria
WHERE id IN (SELECT categoria_id
		FROM Entrada 
        GROUP BY categoria_id 
        HAVING COUNT(categoria_id) >= 3);
        
#MOSTRAR LOS USUARIOS QUE CREARON UNA ENTRADA UN MARTES#
SELECT DISTINCT usr.*
FROM Entrada e
INNER JOIN Usuario usr ON usr.id = e.usuario_id
WHERE DAYOFWEEK(e.fecha) = 2;

#MOSTRAR EL NOMBRE DEL USUARIO QUE TENGA MAS ENTRADAS#
SELECT nombre
FROM Usuario
WHERE id = (SELECT usuario_id
			FROM Entrada
            GROUP BY usuario_id
            ORDER BY COUNT(id)
            LIMIT 1);
            
#MOSTRAR LAS CATEGORIAS SIN ENTRADAS#
SELECT *
FROM Categoria
WHERE id NOT IN (SELECT categoria_id
				FROM Entrada);
                
#NOmbre de las categorias y cuantas entradas tienen#
SELECT c.nombre AS 'Categoria', COUNT(e.id) AS 'Entradas'
FROM Entrada e
RIGHT JOIN Categoria c ON c.id = e.categoria_id
GROUP BY e.categoria_id;

#MOSTRAR EL EMAIL DE LOS USUARIOS Y CUNATAS ENTRADAS TIENEN#
SELECT usr.email AS 'Correo', COUNT(e.id) AS 'Entradas'
FROM Entrada e
RIGHT JOIN Usuario usr ON usr.id = e.usuario_id
GROUP BY e.usuario_id;

#Vistas#
CREATE VIEW categoria_cantidad AS
SELECT c.nombre AS 'Categoria', COUNT(e.id) AS 'Entradas'
FROM Entrada e
RIGHT JOIN Categoria c ON c.id = e.categoria_id
GROUP BY e.categoria_id;


DELIMITER $$
CREATE PROCEDURE sp_crear_categoria(IN _nombre VARCHAR(100))
BEGIN
	DECLARE varName INT DEFAULT 0;
    SELECT COUNT(*) INTO varName
    FROM Categoria
    WHERE LOWER(nombre) = LOWER(_nombre);
    IF varName = 0 THEN
		INSERT INTO Categoria(nombre)
        VALUES(_nombre);
	END IF;
END$$
DELIMITER ;

