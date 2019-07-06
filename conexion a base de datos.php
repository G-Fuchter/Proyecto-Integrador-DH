<?php

$dsn= "mysql:dbname=dbusuarios;host=127.0.0.1;port=3306";
$user= "root";
$pass= "root";

function abrirBaseDeDatos($dsn, $user, $pass) {
return new PDO ($dsn, $user, $pass);
 }

 ?>
