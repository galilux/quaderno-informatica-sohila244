<?php
 
 $conn = new mysqli("localhost", "root", "", "biblioteca");
 
 if ($conn->connect_error) {
     die("Connessione fallita: " . $conn->connect_error);
 }
 
 
 $sqlLibri = "SELECT * FROM Libro";
 $resultLibri = $conn->query($sqlLibri);
 
 echo "<h1>Lista dei Libri</h1>";
 if ($resultLibri->num_rows > 0) {
     echo "<table border='1'><tr><th>ID</th><th>Titolo</th><th>Autore</th><th>Genere</th><th>Anno</th></tr>";
     while ($row = $resultLibri->fetch_assoc()) {
         echo "<tr><td>" . $row["IDLibro"] . "</td><td>" . $row["Titolo"] . "</td><td>" . $row["Autore"] . "</td><td>" . $row["Genere"] . "</td><td>" . $row["AnnoPubblicazione"] . "</td></tr>";
     }
     echo "</table>";
 } else {
     echo "Nessun libro trovato.";
 }
 
 
 $sqlPrestiti = "SELECT Prestito.IDPrestito, Libro.Titolo, Membro.Nome, Membro.Cognome, Prestito.DataInizio, Prestito.DataFine, Prestito.Stato
                 FROM Prestito
                 JOIN Libro ON Prestito.IDLibro = Libro.IDLibro
                 JOIN Membro ON Prestito.IDMembro = Membro.IDMembro";
 $resultPrestiti = $conn->query($sqlPrestiti);
 
 echo "<h1>Lista dei Prestiti</h1>";
 if ($resultPrestiti->num_rows > 0) {
     echo "<table border='1'><tr><th>ID Prestito</th><th>Libro</th><th>Membro</th><th>Data Inizio</th><th>Data Fine</th><th>Stato</th></tr>";
     while ($row = $resultPrestiti->fetch_assoc()) {
         echo "<tr><td>" . $row["IDPrestito"] . "</td><td>" . $row["Titolo"] . "</td><td>" . $row["Nome"] . " " . $row["Cognome"] . "</td><td>" . $row["DataInizio"] . "</td><td>" . $row["DataFine"] . "</td><td>" . $row["Stato"] . "</td></tr>";
     }
     echo "</table>";
 } else {
     echo "Nessun prestito trovato.";
 }
 
 $conn->close();
 ?>