<?php
 
 $valid_username = "admin";
 $valid_password = "password123";
 
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
     $username = isset($_POST['username']) ? trim($_POST['username']) : '';
     $password = isset($_POST['password']) ? trim($_POST['password']) : '';
 
    
     if ($username === $valid_username && $password === $valid_password) {
         echo "<h2>Benvenuto, $username!</h2>";
     } else {
         echo "<h2>Credenziali errate. Riprova.</h2>";
         displayLoginForm(); 
     }
 } else {
     
     displayLoginForm();
 }
 
 
 
 ?>