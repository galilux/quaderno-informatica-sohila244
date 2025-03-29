<!DOCTYPE html>
 <html lang="it">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dati Utente</title>
 </head>
 <body>
     <h1>Dati Inseriti</h1>
     <ul>
         <li><strong>Nome:</strong> <?php echo htmlspecialchars($_POST['nome'] ?? ''); ?></li>
         <li><strong>Cognome:</strong> <?php echo htmlspecialchars($_POST['cognome'] ?? ''); ?></li>
         <li><strong>Data di nascita:</strong> <?php echo htmlspecialchars($_POST['data_nascita'] ?? ''); ?></li>
         <li><strong>Codice fiscale:</strong> <?php echo htmlspecialchars($_POST['codice_fiscale'] ?? 'Non fornito'); ?></li>
         <li><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email'] ?? ''); ?></li>
         <li><strong>Cellulare:</strong> <?php echo htmlspecialchars($_POST['cellulare'] ?? 'Non fornito'); ?></li>
         <li><strong>Indirizzo:</strong>
             <?php
             echo htmlspecialchars($_POST['via'] ?? '') . ', ' .
                  htmlspecialchars($_POST['cap'] ?? '') . ', ' .
                  htmlspecialchars($_POST['comune'] ?? '') . ' (' .
                  htmlspecialchars($_POST['provincia'] ?? '') . ')';
             ?>
         </li>
         <li><strong>Nickname:</strong> <?php echo htmlspecialchars($_POST['nickname'] ?? ''); ?></li>
         <li><strong>Password:</strong> **** (non mostrata per motivi di sicurezza)</li>
     </ul>
 </body>
 </html>