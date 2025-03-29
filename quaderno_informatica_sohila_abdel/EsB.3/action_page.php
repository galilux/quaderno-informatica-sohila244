<?php
 $errors = [];
 $data = [];
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
     if (empty($_POST['nome']) || !preg_match("/^[A-Za-z ]+$/", $_POST['nome'])) {
         $errors['nome'] = "Il nome è obbligatorio e deve contenere solo lettere e spazi.";
     } else {
         $data['nome'] = htmlspecialchars($_POST['nome']);
     }
 
    
     if (empty($_POST['cognome']) || !preg_match("/^[A-Za-z ']+$/", $_POST['cognome'])) {
         $errors['cognome'] = "Il cognome è obbligatorio e deve contenere solo lettere, spazi e apostrofi.";
     } else {
         $data['cognome'] = htmlspecialchars($_POST['cognome']);
     }
 
  
     if (empty($_POST['data_nascita'])) {
         $errors['data_nascita'] = "La data di nascita è obbligatoria.";
     } else {
         $data['data_nascita'] = htmlspecialchars($_POST['data_nascita']);
     }
 
     if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         $errors['email'] = "L'email è obbligatoria e deve essere valida.";
     } else {
         $data['email'] = htmlspecialchars($_POST['email']);
     }
 
     
     if (!empty($_POST['cellulare']) && !preg_match("/^[0-9]{12}$/", $_POST['cellulare'])) {
         $errors['cellulare'] = "Il cellulare deve contenere 12 cifre.";
     } else {
         $data['cellulare'] = htmlspecialchars($_POST['cellulare']);
     }
 
     
     if (empty($_POST['via'])) {
         $errors['via'] = "La via/piazza è obbligatoria.";
     } else {
         $data['via'] = htmlspecialchars($_POST['via']);
     }
 
     if (empty($_POST['cap']) || !preg_match("/^[0-9]{5}$/", $_POST['cap'])) {
         $errors['cap'] = "Il CAP è obbligatorio e deve essere di 5 cifre.";
     } else {
         $data['cap'] = htmlspecialchars($_POST['cap']);
     }
 
     if (empty($_POST['comune'])) {
         $errors['comune'] = "Il comune è obbligatorio.";
     } else {
         $data['comune'] = htmlspecialchars($_POST['comune']);
     }
 
     if (empty($_POST['provincia']) || !preg_match("/^[A-Za-z]{2}$/", $_POST['provincia'])) {
         $errors['provincia'] = "La provincia è obbligatoria e deve essere una sigla di due lettere.";
     } else {
         $data['provincia'] = htmlspecialchars($_POST['provincia']);
     }
 
 
     if (empty($_POST['nickname']) || $_POST['nickname'] === $_POST['nome'] || $_POST['nickname'] === $_POST['cognome']) {
         $errors['nickname'] = "Il nickname è obbligatorio e deve essere diverso da nome e cognome.";
     } else {
         $data['nickname'] = htmlspecialchars($_POST['nickname']);
     }
 
    
     if (empty($_POST['password']) || !preg_match("/(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}/", $_POST['password'])) {
         $errors['password'] = "La password deve avere almeno 8 caratteri, una maiuscola, un numero e un carattere speciale.";
     }
 
   
     if (empty($errors)) {
         echo "<h1>Dati Inseriti</h1>";
         echo "<ul>";
         foreach ($data as $key => $value) {
             echo "<li><strong>" . ucfirst($key) . ":</strong> $value</li>";
         }
         echo "</ul>";
         exit;
     }
 }
 ?>