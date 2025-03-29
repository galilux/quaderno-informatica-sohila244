CREATE TABLE Libro (
     IDLibro INT PRIMARY KEY AUTO_INCREMENT,
     Titolo VARCHAR(100),
     Autore VARCHAR(100),
     Genere VARCHAR(50),
     AnnoPubblicazione INT
 );
 
 CREATE TABLE Membro (
     IDMembro INT PRIMARY KEY AUTO_INCREMENT,
     Nome VARCHAR(50),
     Cognome VARCHAR(50),
     Email VARCHAR(100),
     DataRegistrazione DATE
 );
 
 
 CREATE TABLE Prestito (
     IDPrestito INT PRIMARY KEY AUTO_INCREMENT,
     IDLibro INT,
     IDMembro INT,
     DataInizio DATE,
     DataFine DATE,
     Stato ENUM('In corso', 'Restituito'),
     FOREIGN KEY (IDLibro) REFERENCES Libro(IDLibro),
     FOREIGN KEY (IDMembro) REFERENCES Membro(IDMembro)
 );