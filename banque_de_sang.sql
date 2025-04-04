
CREATE DATABASE IF NOT EXISTS banque_of_blood;
USE banque_of_blood;


CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    role ENUM('administrateur', 'gestionnaire') NOT NULL
);


CREATE TABLE blood (
    id INT AUTO_INCREMENT PRIMARY KEY,
    groupe_sanguin ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') NOT NULL,
    quantite INT NOT NULL,
    date_collecte DATE NOT NULL
);


INSERT INTO utilisateur (login, password, role) VALUES ('admin', 'admin123', 'administrateur');