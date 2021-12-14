CREATE TABLE Capteur (
    CapteurID   INTEGER       PRIMARY KEY,
    TypeCapteur VARCHAR (255) 
);


-- Table: Freq Cardiaque
CREATE TABLE FreqCardiaque (
    FreqID              INTEGER      PRIMARY KEY,
    UserID              INTEGER      REFERENCES Utilisateur (UserID),
    ValeurFrequence     FLOAT (255),
    HeureRecueFreq      DATETIME
);


-- Table: Mesures
CREATE TABLE Mesures (
    MesureID         	    INTEGER     PRIMARY KEY,
    CapteurID    	        INTEGER     REFERENCES Capteur (CapteurID),
    FreqID           	 	INTEGER     REFERENCES FreqCardiaque (FreqID),
    ValeurRecueSalle  	    FLOAT (255),
    HeureReceptionSalle     DATETIME
);


-- Table: Role
CREATE TABLE Rol (
    RoleID                  INTEGER       PRIMARY KEY,
    RoleName                VARCHAR (255) 
);


-- Table: Room
CREATE TABLE Room (
    RoomID                  INTEGER       PRIMARY KEY,
    RoomName                VARCHAR (255) 
);


-- Table: Utilisateur
CREATE TABLE Utilisateur (
    UserID        INTEGER       PRIMARY KEY,
    RoleID        INTEGER       REFERENCES Rol (RoleID),
    UserEmail      VARCHAR (255),
    UserLastName  VARCHAR (255),
    UserFirstName VARCHAR (255),
    UserPassword   VARCHAR (255) 
);
