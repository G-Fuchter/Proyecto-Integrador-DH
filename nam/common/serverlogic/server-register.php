<?php
include_once("validate-input.php");
// define variables and set to empty values
$nombre = $email = $pass = $domicilio = $apellido = "";
$register_errors = [];
$errors_found = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = test_input($_POST["nombre"]);
  $email = test_input($_POST["email"]);
  $apellido = test_input($_POST["apellido"]);
  $domicilio = test_input($_POST["domicilio"]);
  $pass = test_input($_POST["pass"]);

  $register_errors = validate_name($nombre, $register_errors);
  $register_errors = validate_name($apellido, $register_errors);
  $register_errors = validate_street($domicilio, $register_errors);
  $register_errors = validate_email($email, $register_errors);
  $register_errors = validate_password($pass, $register_errors);

  if(sizeof($register_errors) > 0){ // Si hay errores
    $errors_found = true;
  }else{ // Si no hay errores
    $errors_found = false;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>