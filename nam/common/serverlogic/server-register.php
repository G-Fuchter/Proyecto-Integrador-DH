<?php
session_start();
include_once("./common/StaticClasses/RegisterValidator.php");
include_once("database-service.php");
include_once("common/Models/User.php");
include_once("common/Services/DBService.php");
// define variables and set to empty values
$nombre = $email = $pass = $domicilio = $apellido = "";
$register_errors = [];
$errors_found = true;
$db = DBService::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = test_input($_POST["nombre"]);
  $email = test_input($_POST["email"]);
  $apellido = test_input($_POST["apellido"]);
  $domicilio = test_input($_POST["domicilio"]);
  $pass = test_input($_POST["pass"]);
  $pais = test_input($_POST["pais"]);
  $posibles_paises = ["Argentina", "Brasil", "Bolivia", "Colombia", "Chile", "Ecuador", "Peru", "Uruguay"];
  $dieta = test_input($_POST["dieta"]);
  $posibles_dietas = ["Vegan", "Vegeterian", "Gluten Free", "Normal"];

  $register_errors = RegisterValidator::validate_name($nombre, $register_errors);
  $register_errors = RegisterValidator::validate_name($apellido, $register_errors);
  $register_errors = RegisterValidator::validate_street($domicilio, $register_errors);
  $register_errors = RegisterValidator::validate_email($email, $register_errors);
  $register_errors = RegisterValidator::validate_password($pass, $register_errors);
  $register_errors = RegisterValidator::validate_selected_value($pais, $posibles_paises, $register_errors);
  $register_errors = RegisterValidator::validate_selected_value($dieta, $posibles_dietas, $register_errors);

  if (sizeof($register_errors) > 0) { // Si hay errores
    $errors_found = true;

    $_SESSION["register-info"] = [$nombre, $apellido, $email, $pass, $domicilio, $dieta, $pais];
  } else { // Si no hay errores
    $errors_found = false;
    $userToSave = new User(0, $nombre, $apellido, $email, $pass, $domicilio, $dieta, $pais);
    $db->saveUser($userToSave);
  }
} else {
  if (isset($_SESSION["register-info"])) {
    $nombre = $_SESSION["register-info"][0];
    $apellido = $_SESSION["register-info"][1];
    $email = $_SESSION["register-info"][2];
    $pass = $_SESSION["register-info"][3];
    $domicilio = $_SESSION["register-info"][4];
    $pais = $_SESSION["register-info"][6];
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}