Create database dbcrud;

use dbcrud;

CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL,
sexo CHAR(1) NOT NULL,
fone VARCHAR(15) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
senha VARCHAR(255) NOT NULL
);
CREATE TABLE tbnoticias (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(100) NOT NULL,
data date not null,
autor int,
noticia text NOT null,
foto VARCHAR(255) NOT NULL,
 FOREIGN KEY (`autor`)   REFERENCES`usuarios`(`id`) ON DELETE CASCADE
);

