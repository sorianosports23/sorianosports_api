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
  messageContact VARCHAR(255) NOT NULL,
  status VARCHAR(1) NOT NULL
);

CREATE TABLE permissions (
  username VARCHAR(50),
  permission VARCHAR(10),
  PRIMARY KEY(username, permission),
  CONSTRAINT fk_username_perm (username) REFERENCES users(username)
);

CREATE TABLE directive (
  id INT(2) AUTO_INCREMENT PRIMARY KEY,
  image LONGBLOB,
  name VARCHAR(50),
  rank VARCHAR(50),
  imgType VARCHAR(20)
);

CREATE TABLE greatEvents(
  id INT(5) AUTO_INCREMENT PRIMARY KEY,
  image LONGBLOB,
  name VARCHAR(255),
  description VARCHAR(255),
  linkplace VARCHAR(100),
  date DATE
);

CREATE TABLE sports(
  id INT(3) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60),
  city VARCHAR(60)
)

CREATE TABLE sports_date(
  id INT(3) PRIMARY KEY,
  day VARCHAR(10),
  hour VARCHAR(10)
);

CREATE TABLE place(
  id INT(3) AUTO_INCREMENT PRIMARY KEY,
  sport VARCHAR(60),
  age INT(2),
  city VARCHAR(128),
  place VARCHAR(60),
  teacher VARCHAR(128),
  date VARCHAR(50),
  time VARCHAR(60)
);

CREATE TABLE inscriptionForm(
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(70),
    lastname VARCHAR(70),
    birthday DATE,
    ci INT(8),
    gender BOOLEAN,
    medicalRecord BOOLEAN,
    expiration DATE,
    city VARCHAR(50),
    residence VARCHAR(60),
    phone INT(9),
    email VARCHAR(70),
    schoolYear VARCHAR(50),
    alternativePhone INT(9),
    sportTimeStart TIME,
    sportTimeEnd TIME, 
    activityPlace VARCHAR(60),
    anotherSport VARCHAR(60),
    oldPractisedSport VARCHAR(60),
    medicalAssistence VARCHAR(60),
    whatMedicalCare VARCHAR(60),
    medicalAssitencePhone INT(9),
    bloodGroup VARCHAR(50),
    diabetes BOOLEAN, 
    hypertension BOOLEAN,
    fractures BOOLEAN,
    allergy BOOLEAN,
    asthma BOOLEAN,
    otherDiseases VARCHAR(255),
    wearGlasses BOOLEAN,
    whatTypeGlasses VARCHAR(60)
);

CREATE TABLE search(
  id int(5) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60) UNIQUE, 
  url VARCHAR(255),
  description VARCHAR(255)
);

CREATE TABLE keywords (
  id INT(5), 
  name VARCHAR(255),
  PRIMARY KEY (id, name),
  FOREIGN KEY (id) REFERENCES search(id)
);

CREATE TABLE cityPlace (
  nameCity VARCHAR(60),
  nameSport VARCHAR(60),
  PRIMARY KEY(nameCity, nameSport);
);

CREATE TABLE event (
  id INT(3) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  place VARCHAR(50),
  time VARCHAR(50),
  sport VARCHAR(50),
  description VARCHAR(255),
  date_ev DATE
);

/*Base de Datos de la API que almacena datos del usuario en una tabla llamada "users"*/
