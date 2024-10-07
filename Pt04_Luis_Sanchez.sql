-- Crear la base de datos
DROP DATABASE IF EXISTS `pt04_luis_sanchez`;
CREATE DATABASE IF NOT EXISTS `pt04_luis_sanchez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_luis_sanchez`;

-- Crear la tabla `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,  -- Contraseña almacenada de forma segura (hash)
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar 5 usuarios
INSERT INTO `usuarios` (nombre_usuario, email, contraseña) VALUES 
('usuario1', 'usuario1@example.com', 'password_hash1'),
('usuario2', 'usuario2@example.com', 'password_hash2'),
('usuario3', 'usuario3@example.com', 'password_hash3'),
('usuario4', 'usuario4@example.com', 'password_hash4'),
('usuario5', 'usuario5@example.com', 'password_hash5');

-- Crear la tabla `articles`
CREATE TABLE IF NOT EXISTS `articles` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(255) NOT NULL,
    cos TEXT NOT NULL,
    usuario_id INT,  -- Clave foránea para relacionar con la tabla usuarios
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Insertar 5 artículos relacionados con los usuarios
INSERT INTO articles (titol, cos, usuario_id) VALUES 
('El tigre de Bengala', 'El tigre de Bengala es uno de los felinos más grandes del mundo.', 1),
('El lobo gris', 'El lobo gris es un mamífero que habita en Norteamérica y Eurasia.', 2),
('El elefante africano', 'El elefante africano es el animal terrestre más grande del mundo.', 3),
('El oso polar', 'El oso polar vive en las regiones árticas y está adaptado al frío extremo.', 4),
('El águila calva', 'El águila calva es un ave rapaz y el símbolo nacional de los Estados Unidos.', 5),
('El león africano', 'El león africano es conocido como el rey de la selva y es un depredador formidable.', 1),
('El delfín nariz de botella', 'El delfín nariz de botella es un mamífero marino muy inteligente.', 2),
('El gorila de montaña', 'El gorila de montaña vive en las selvas africanas y es una especie en peligro.', 3),
('El rinoceronte blanco', 'El rinoceronte blanco es uno de los animales más grandes y se encuentra en África.', 4),
('El jaguar', 'El jaguar es el felino más grande de América y tiene una fuerza impresionante.', 5),
('El pingüino emperador', 'El pingüino emperador vive en la Antártida y es el más grande de todas las especies de pingüinos.', 1),
('El camello bactriano', 'El camello bactriano tiene dos jorobas y es nativo de las regiones desérticas de Asia.', 2),
('El puma', 'El puma, también conocido como león de montaña, habita en América del Norte y del Sur.', 3),
('El zorro ártico', 'El zorro ártico es un animal que vive en las regiones más frías del planeta.', 4),
('El canguro rojo', 'El canguro rojo es el marsupial más grande y vive en Australia.', 5),
('El hipopótamo', 'El hipopótamo es un animal semiacuático que vive en los ríos de África.', 1),
('La ballena azul', 'La ballena azul es el animal más grande que haya existido en la Tierra.', 2),
('El oso negro americano', 'El oso negro americano es una especie de oso que vive en América del Norte.', 3),
('El búho nival', 'El búho nival es una especie de ave rapaz que vive en las regiones árticas.', 4),
('La jirafa', 'La jirafa es el animal terrestre más alto y vive en las sabanas africanas.', 5);

COMMIT;
