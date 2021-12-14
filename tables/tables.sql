CREATE TABLE Capteur (
    [Capteur ID]   INTEGER       PRIMARY KEY,
    [Type Capteur] VARCHAR (255) 
);


-- Table: Freq Cardiaque
CREATE TABLE FreqCardiaque (
    [Freq ID]          INTEGER      PRIMARY KEY,
    [User ID]          INTEGER      REFERENCES Utilisateur ([User ID]),
    [Valeur Frequence] FLOAT (255),
    [Heure Recue Freq] DATETIME
);


-- Table: Mesures
CREATE TABLE Mesures (
    [Mesure ID]             INTEGER  PRIMARY KEY,
    [Capteur ID]            INTEGER  REFERENCES Capteur ([Capteur ID]),
    [Freq ID]               INTEGER  REFERENCES FreqCardiaque ([Freq ID]),
    [Valeur Recue Salle]    DOUBLE (255),
    [Heure Reception Salle] DATETIME
);


-- Table: Role
CREATE TABLE Rol (
    [Role ID]   INTEGER       PRIMARY KEY,
    [Role Name] VARCHAR (255) 
);


-- Table: Room
CREATE TABLE Room (
    [Room ID]   INTEGER       PRIMARY KEY,
    [Room Name] VARCHAR (255) 
);


-- Table: Utilisateur
CREATE TABLE Utilisateur (
    [User ID]         INTEGER       PRIMARY KEY,
    [Role ID]         INTEGER       REFERENCES Rol ([Role ID]),
    [User Email]      VARCHAR (255),
    [User Last Name]  VARCHAR (255),
    [User First Name] VARCHAR (255),
    [User Password]   VARCHAR (255) 
);
