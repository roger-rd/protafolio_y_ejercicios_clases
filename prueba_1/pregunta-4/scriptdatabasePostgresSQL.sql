CREATE DATABASE crud_db;

\c crud_db;

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  run VARCHAR(20) UNIQUE NOT NULL,
  age INT NOT NULL
);
