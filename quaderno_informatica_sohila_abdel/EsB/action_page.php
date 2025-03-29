<?php
 
 $valid_username = "admin";
 $valid_password = "1234";
 
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
     if (isset($_POST['submit'])) {
        
         $username = $_POST['username'] ?? '';
         $password = $_POST['password'] ?? '';
 
         
         if ($username === $valid_username && $password === $valid_password) {
             
             echo "<h2>Benvenuto, $username!</h2>";
         } else {
            
             echo "<h3 style='color:red;'>Credenziali errate. Riprova.</h3>";
             showLoginForm();
         }
     }
 } else {
     
     showLoginForm();
 }
 
 
 ?>