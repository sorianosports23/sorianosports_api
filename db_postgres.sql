CREATE DATABASE apiSPT;

CREATE TABLE users(
  id SERIAL PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  fullname VARCHAR(50) NOT NULL,
  password TEXT NOT NULL,
  email VARCHAR(50) NOT NULL,
  age INT CHECK (
    age > 0
    AND age < 999
  ),
  -- Restringir el rango de edad
  ci INT CHECK (
    ci > 0
    AND ci < 99999999
  ),
  -- Restringir el rango de CI
  phone INT CHECK (
    phone > 0
    AND phone < 999999999
  ) -- Restringir el rango de teléfono
);

CREATE TABLE news (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255),
  img BYTEA,
  -- Usar BYTEA en lugar de LONGBLOB
  description VARCHAR(255),
  note TEXT,
  imgType VARCHAR(20),
  author VARCHAR(50),
  date DATE
);

-- ... resto de las tablas ...