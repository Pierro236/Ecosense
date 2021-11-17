--
-- File generated with SQLiteStudio v3.3.3 on ven. nov. 12 15:47:04 2021
--
-- Text encoding used: System
--
BEGIN TRANSACTION;

-- Table: Capteur
CREATE TABLE Capteur ("Capteur ID" INTEGER PRIMARY KEY, "Type Capteur" VARCHAR (255));

-- Table: Mesures
CREATE TABLE Mesures ("Mesure ID" INTEGER PRIMARY KEY, "Capteur ID" INTEGER REFERENCES Capteur ("Capteur ID"), "Valeur Recue Salle" FLOAT, "Heure Reception Salle" DATETIME, "Valeur Frequence" FLOAT, "Heure Reception Frequence" DATETIME);

-- Table: Role_a
CREATE TABLE Role_a ("Role ID" INTEGER PRIMARY KEY, "Role Name" VARCHAR (255));

-- Table: Room
CREATE TABLE Room ("Room ID" INTEGER PRIMARY KEY, "Room Name" VARCHAR (255));

-- Table: Utilisateur
CREATE TABLE Utilisateur ("User ID" INTEGER PRIMARY KEY, "Role ID" INTEGER REFERENCES Role ("Role ID"), "User Email" VARCHAR (255), "User Last Name" VARCHAR (255), "User First Name" VARCHAR (255), "User Password" VARCHAR (255));

COMMIT TRANSACTION;

