CREATE DATABASE fita;
USE fita;
CREATE TABLE users (
	id_user MEDIUMINT AUTO_INCREMENT,
	name VARCHAR(25),
	mail VARCHAR(50),
    register DATA,
	pwd VARCHAR(100)
);