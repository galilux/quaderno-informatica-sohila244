
<body>
    <h1>Inserimento dati Film e Proiezioni</h1>

    <?php
// Connessione al database (modifica con i tuoi dati)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_db"; // Sostituisci con il nome del tuo database

$conn = new mysqli ($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variabili per gestire l'inserimento
$codice_film = $titolo = $anno_produzione = $regista = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati tramite POST
    $codice_film = $_POST['Codice_Film'];
    $titolo = $_POST['Titolo'];
    $anno_produzione = $_POST['Anno_Produzione'];
    $regista = $_POST['Regista'];

    // Query SQL per inserire i dati nella tabella
    $sql = "INSERT INTO Film (Codice_Film, Titolo, Anno_Produzione, Regista)
            VALUES ('$codice_film', '$titolo', '$anno_produzione', '$regista')";

    // Esegui la query
    if ($conn->query($sql) === TRUE) {
        echo "Nuovo film inserito con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Film</title>
</head>
<body>
    <h2>Inserisci un nuovo Film</h2>
    <!-- Modulo per inserire i dati -->
    <form method="POST" action="">
        <label for="Codice_Film">Codice Film:</label>
        <input type="text" id="Codice_Film" name="Codice_Film" required><br><br>

        <label for="Titolo">Titolo:</label>
        <input type="text" id="Titolo" name="Titolo" required><br><br>

        <label for="Anno_Produzione">Anno di Produzione:</label>
        <input type="number" id="Anno_Produzione" name="Anno_Produzione" required><br><br>

        <label for="Regista">Regista:</label>
        <input type="text" id="Regista" name="Regista" required><br><br>

        <input type="submit" value="Inserisci Film">
    </form>


   
</body>
</html>