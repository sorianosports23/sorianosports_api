CREATE DATABASE apiSPT;
use apiSPT;

CREATE TABLE users(
  username VARCHAR(50) PRIMARY KEY NOT NULL,
  fullname VARCHAR(50) NOT NULL
  password text NOT NULL,
  email VARCHAR(50) NOT NULL,
  age INT(3) NOT NULL,
  ci INT(8) NOT NULL,
  phone INT(9) NOT NULL
);

CREATE TABLE news (
  id INT(5) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  img LONGBLOB,  
  description VARCHAR(255),
  note TEXT,
  imgType VARCHAR(20),
  author VARCHAR(50),
  date DATE
);

CREATE TABLE contact (
  id INT(5) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  correo VARCHAR(50) NOT NULL,
  subject VARCHAR(50) NOT NULL,
  mensaje VARCHAR(255) NOT NULL
);

CREATE TABLE permissions (
  username VARCHAR(50),
  permission VARCHAR(10),
  PRIMARY KEY(username, permission),
  CONSTRAINT fk_username_perm (uesrname) REFERENCES users(username)
);

CREATE TABLE directive (
  id INT(2) AUTO_INCREMENT PRIMARY KEY,
  image LONGBLOB,
  name VARCHAR(50),
  rank VARCHAR(50),
  imgType VARCHAR(20)
);

/*Base de Datos de la API que almacena datos del usuario en una tabla llamada "users"*/
