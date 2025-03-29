<?php
     /*
     $first_name = $_POST["first_name"];
     $second_name = $_POST["second_name"];
     
     echo $first_name;
     echo $second_name;
     */
 $username = $_POST["username"];
 echo "<br>";
 
 $password = $_POST["password"];
 
 if($username!="admin" && $password!="password"){
     echo"<h4> ATTENZIONE ";
 }
 else  {
     echo"<h4>WELLCOME" . $username;
 } 
 /*
 echo "username:<br>" . $usernmae;
 
 echo "<br>";
 echo "password:<br>" .  $password ;
 */
 ?>
 