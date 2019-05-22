<?php
include_once("validate-input.php");
session_start();
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
  $pais = test_input($_POST["pais"]);
  $posibles_paises = ["Argentina", "Brasil", "Bolivia", "Colombia", "Chile", "Ecuador", "Peru", "Uruguay"];

  $register_errors = validate_name($nombre, $register_errors);
  $register_errors = validate_name($apellido, $register_errors);
  $register_errors = validate_street($domicilio, $register_errors);
  $register_errors = validate_email($email, $register_errors);
  $register_errors = validate_password($pass, $register_errors);
  $register_errors = validate_selected_value($pais, $posibles_paises ,$register_errors);

  if(sizeof($register_errors) > 0){ // Si hay errores
    $errors_found = true;
    $_SESSION["register-info"]["nombre"] = $nombre;
    $_SESSION["register-info"]["email"] = $email;
    $_SESSION["register-info"]["apellido"] = $apellido;
    $_SESSION["register-info"]["domicilio"] = $domicilio;
    $_SESSION["register-info"]["pass"] = $pass;
    $_SESSION["register-info"]["pais"] = $pais;
  }else{ // Si no hay errores
    $errors_found = false;
  }
}else{
    if(isset($_SESSION["register-info"])){
        $nombre = $_SESSION["register-info"]["nombre"];
        $email = $_SESSION["register-info"]["email"];
        $apellido = $_SESSION["register-info"]["apellido"];
        $domicilio = $_SESSION["register-info"]["domicilio"];
        $pass = $_SESSION["register-info"]["pass"];
        $pais = $_SESSION["register-info"]["pais"];
    }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>