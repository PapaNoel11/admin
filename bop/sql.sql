CREATE DATABASE products_db;

USE products_db;

CREATE TABLE products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  photo TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  age_rating VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
