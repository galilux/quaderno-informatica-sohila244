
<body>
    <h1>Gestione Film e Proiezioni</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";        // Host del database (di solito 'localhost')
        $username = "root";         // Nome utente del database
        $password = "";             // Password del database
        $dbname = "film_db";  // Nome del database
    
        // Creazione della connessione
        $conn = new mysqli($host, $username, $password, $dbname);
    
        // Controllo della connessione
        if ($conn->connect_error) {
            // Mostra un messaggio di errore in caso di connessione fallita
            echo "<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>";
        } else {
            // Mostra un messaggio di successo in caso di connessione riuscita
            echo "<p style='color: green;'>Connessione al database avvenuta con successo!</p>";
        }
    
        // Chiusura della connessione
        //$conn->close();
        ?>

    <form action="index.php" method="post">
        <input type="submit" name="view_film" value="Visualizza Film">
        <input type="submit" name="view_attore" value="Visualizza Attori">
        <input type="submit" name="view_proiezione" value="Visualizza Proiezioni">
    </form>

   

<?php
    if (isset($_POST['view_film'])) {
        $result = $conn->query("SELECT * FROM Film");
        echo "<h2>Film</h2><table border='1'><tr><th>Codice Film</th><th>Titolo</th><th>Anno di Produzione</th><th>Regista</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Codice_Film'] . "</td><td>" . $row['Titolo'] . "</td><td>" . $row['Anno_Produzione'] . "</td><td>" . $row['Regista'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_attore'])) {
        $result = $conn->query("SELECT * FROM Attore");
        echo "<h2>Attori</h2><table border='1'><tr><th>Codice Attore</th><th>Nome</th><th>Cognome</th><th>Nazionalità</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Codice_Attore'] . "</td><td>" . $row['Nome'] . "</td><td>" . $row['Cognome'] . "</td><td>" . $row['Nazionalità'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_proiezione'])) {
        $result = $conn->query("SELECT * FROM Proiezione");
        echo "<h2>Proiezioni</h2><table border='1'><tr><th>Codice Proiezione</th><th>Città</th><th>Sala</th><th>Data</th><th>Ora</th><th>Numero Spettatori</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Codice_Proiezione'] . "</td><td>" . $row['Città'] . "</td><td>" . $row['Sala'] . "</td><td>" . $row['Data'] . "</td><td>" . $row['Ora'] . "</td><td>" . $row['Numero_Spettatori'] . "</td></tr>";
        }
        echo "</table>";
    }

    //$conn->close();
    ?>

<p>Clicca sul link qui sotto per andare alla pagina di inserimento dati:</p>
<a href="insert_data.php">Pagina di inserimento dati</a>

</body>
</html>
