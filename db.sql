CREATE DATABASE apiSPT;
use apiSPT;

CREATE TABLE users(
  username VARCHAR(50) PRIMARY KEY NOT NULL,
  password VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  age INT(3) NOT NULL,
  ci INT(8) NOT NULL,
  phone INT(9) NOT NULL
);

CREATE TABLE activities(
  id INT(5) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  place VARCHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL
);

CREATE TABLE events(
  id INT(5) NOT NULL,
  fecha DATE NOT NULL,
  horario TIME NOT NULL,
  CONSTRAINT fk_id_events_cat FOREIGN KEY (id) REFERENCES activities(id)
);  

CREATE TABLE contact(
  name VARCHAR(50),
  correo VARCHAR(50)
  affair VARCHAR(50),
  Mensaje VARCHAR(255)
);

CREATE TABLE inscription_sport(
  Nombre varchar(50),
  Apellido varchar(50),
  Fecha_Nacimiento Date,
  cedula int(8) primary key,
  Sexo varchar(20),
  Ficha_Medica date,
  Ciudad varchar(30),
  Domicilio varchar(30),
  Celular int(8),
  Email varchar(50),
  Año_que_cursa varchar(40),
  Tel_alternativo int(10),
  Act_Desarrollar varchar(50),
  Lugar_Deporte varchar(50),
  Otros_Deportes varchar(50),
  Dep_Practicados varchar(50),
  Asis_Medica varchar(40),
  Grup_Sangre varchar(40),
  Enfermedades varchar(50),
  Usa_Lentes varchar(10)
);

Create table news(
name varchar(50),
description varchar(50),
img longblob,
note longblob
);

CREATE TABLE permissions (
  username VARCHAR(50),
  permission VARCHAR(20),
  CONSTRAINT fk_username_perm FOREIGN KEY username REFERENCES users(username)
);


/*Base de Datos de la API que almacena datos del usuario en una tabla llamada "users"*/
