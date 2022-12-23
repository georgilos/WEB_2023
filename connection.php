<?php

// σύνδεση με την ΒΔ που έχουμε δημιουργήσει στο phpmyadmin
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "katanalotis";
 

 if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
 {
 
     die("failed to connect!");
 }


?>