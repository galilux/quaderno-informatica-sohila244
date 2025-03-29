<?php
 
 $conn = new mysqli("localhost", "root", "", "biblioteca");
 
 
 if ($conn->connect_error) {
     die("Connessione fallita: " . $conn->connect_error);
 }
 
 
 $titolo = $_POST['titolo'];
 $autore = $_POST['autore'];
 $genere = $_POST['genere'];
 $anno = $_POST['anno'];
 
 $sql = "INSERT INTO Libro (Titolo, Autore, Genere, AnnoPubblicazione) 
         VALUES ('$titolo', '$autore', '$genere', $anno)";
 
 if ($conn->query($sql) === TRUE) {
     echo "Libro inserito con successo!";
 } else {
     echo "Errore: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
 ?>