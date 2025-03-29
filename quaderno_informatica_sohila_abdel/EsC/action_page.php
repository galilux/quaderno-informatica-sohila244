<?php
 // Controlla se il metodo della richiesta è POST e se è stato inviato il form
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
     // Recupera il numero selezionato dall'utente
     $n = (int)$_POST['number'];
 
     // Verifica che il numero sia compreso tra 1 e 10
     if ($n >= 1 && $n <= 10) {
         // Genera la tabella con i quadrati e i cubi
         echo "<html lang='it'><head><meta charset='UTF-8'><title>Risultato</title>";
         echo "<link rel='stylesheet' href='style.css'></head><body>";
         echo "<div class='container'>";
         echo "<h2>Tabella dei Quadrati e Cubi fino a $n</h2>";
         echo "<table>";
         echo "<tr><th>Numero</th><th>Quadrato</th><th>Cubo</th></tr>";
 
         for ($i = 1; $i <= $n; $i++) {
             $quadrato = $i * $i;
             $cubo = $i * $i * $i;
             echo "<tr><td>$i</td><td>$quadrato</td><td>$cubo</td></tr>";
         }
 
         echo "</table>";
         echo "</div></body></html>";
     } else {
         // Se il numero non è valido, visualizza un messaggio di errore
         echo "<html lang='it'><head><meta charset='UTF-8'><title>Errore</title>";
         echo "<link rel='stylesheet' href='style.css'></head><body>";
         echo "<div class='container'>";
         echo "<h3 style='color: red;'>Il numero selezionato non è valido. Riprova.</h3>";
         echo "</div></body></html>";
     }
 } else {
     // Se l'accesso a questa pagina avviene senza POST, reindirizza all'index
     header('Location: index.html');
     exit;
 }