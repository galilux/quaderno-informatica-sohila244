<?php
// Connessione al database
$servername = "localhost";
$username = "root"; // Il tuo username per il DB
$password = ""; // La tua password per il DB
$dbname = "JOIN_DB"; // Il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo"Connessione al DB effettuata con successo! <br><br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Se i campi sono presenti, assegna i valori alle variabili
        $user = $_POST['username'];
        $pass = $_POST['password'];
   
    // Verifica se l'utente esiste nel DB
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Login riuscito
        echo "Login effettuato con successo!"; 
    } else {
        // Reindirizza alla pagina di registrazione
        echo "Errore le credenziali per accedere al DB sono errate!" . "<br>";
        echo "<a href='register.php'>inserisci i tuoi dati</a><br><br>
        <a href='compito_20250204.html'><button>HOME</button></a>";
        exit;
    }
}

if (isset($_POST['delete'])) {
    // Ottieni l'ID dell'utente da eliminare
    $idToDelete = $_POST['id_cliente'];

    // Crea la query di eliminazione
    $sqlDelete = "DELETE FROM users WHERE id_cliente = $idToDelete";

    // Esegui la query
    if ($conn->query($sqlDelete) === TRUE) {
    }
}
}
echo "<br><a href='compito_20250303.html'><button>Torna indietro</button></a><br><br>";
$sql = "SELECT * FROM users"; // Query per selezionare tutti i dati dalla tabella 'users'
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    
    echo "<h2>Dati della Tabella Users</h2>";
    echo "<table border='1'>
            <tr>
                <th>Codice utente</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nome</th>
                <th>Cognome</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_cliente"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["surname"] . "</td>
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id_cliente'] . "'>
                    <input type='submit' name='delete' value='Elimina utente'>
                </form>
                </td>
            </tr>";
        }
    echo "</table><br><br><br>";
} else {
    echo "0 risultati trovati";
    echo "<br><br><a href='compito_20250303.html'><button>Torna indietro</button></a>";
}


    $sql = "SELECT * FROM prenotazione"; 
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<h2>Le tue prenotazioni!</h2>";
    echo "<table border='1'>
            <tr>
                <th>Codice prenotazione</th>
                <th>Data di prenotazione</th>
                <th>Data di scadenza</th>
                <th>Metodo di pagamento</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_prenotazione"] . "</td>
                <td>" . $row["data_prenotazione"] . "</td>
                <td>" . $row["data_scadenza"] . "</td>
                <td>" . $row["metodo_pagamento"] . "</td>
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id_prenotazione'] . "'>
                    <input type='submit' name='delete' value='Elimina prenotazione'>
                </form>
                </td>
            </tr>";
        }
    echo "</table>";
} else {
    echo "<br><br>Non ci sono prenotazioni!";
}

echo "<br><br><a href='add_prenotazione.php'><button>Prenota!</button></a>";
    echo "<br><br><a href='compito_20250303.html'><button>Torna indietro</button></a>";


    echo "<h2>Tabella Join</h2>";

    $sql = "SELECT users.id_cliente, users.username, users.name, users.surname, prenotazione.id_prenotazione, prenotazione.data_prenotazione, prenotazione.data_scadenza, prenotazione.metodo_pagamento 
    FROM users 
    JOIN prenotazione ON users.id_cliente = prenotazione.id_cliente";

// Esegui la query
$result = $conn->query($sql);

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
// Ciclo per stampare ogni risultato
while($row = $result->fetch_assoc()) {
    echo "ID Cliente: " . $row["id_cliente"]. " - Username: " . $row["username"]. " - Nome: " . $row["name"]. " - Cognome: " . $row["surname"]. 
         " - ID Prenotazione: " . $row["id_prenotazione"]. " - Data Prenotazione: " . $row["data_prenotazione"]. " - Data Scadenza: " . $row["data_scadenza"] . 
         " - Metodo di Pagamento: " . $row["metodo_pagamento"] . "<br>";
}
} else {
echo "Nessun risultato trovato";
}
?>