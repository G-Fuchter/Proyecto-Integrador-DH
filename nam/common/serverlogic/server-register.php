<?php
session_start();
include_once("validate-input.php");
include_once("database-service.php");
// define variables and set to empty values
$nombre = $email = $pass = $domicilio = $apellido = "";
$register_errors = [];
$errors_found = true;

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
    $user["name"] = $nombre;
    $user["surname"] = $apellido;
    $user["password"] = $pass;
    $user["country"] = $pais;
    $user["address"] = $domicilio;
    $user["email"] = $email;
    addUser($user, "users.json");
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

/*
function validate_name($name_to_validate, $errors){
    if(empty($name_to_validate)){
        $errors[] = "Debe ingresar su nombre y su apellido!";
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$name_to_validate)) {
        $errors[] = "Sólo letras y espacios";
    }
    if(strlen($name_to_validate) > 25){
        $errors[] = "Nombre demasiado largo";
    }
    return $errors;
}

function validate_email($email_to_validate, $errors){
    if(empty($email_to_validate)){
        $errors[] = "Debe ingresar su email!";
    }else{
        if (!filter_var($email_to_validate, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalido";
        }
        if(strlen($email_to_validate) > 40){
            $errors[] = "Email demasiado largo";
        }
    }
    return $errors;
}

function validate_street($street_to_validate, $errors){
    if(empty($street_to_validate)){
        $errors[] = "Debe ingresar su dirección!";
    }else{
        if(!preg_match("/^[a-zA-Z]+\ +[0-9]+$/",$street_to_validate)){
            $errors[] = "Dirección Invalida";
        }
        if(strlen($street_to_validate) > 40){
            $errors[] = "Dirección demasiada larga";
        }
    }
    return $errors;
}

function validate_password($password_to_validate, $errors){
    if(empty($password_to_validate)){
        $errors[] = "Debe ingresar una contraseña!";
    }else{
        if(strlen($password_to_validate) > 40 || strlen($password_to_validate) < 8){
            $errors[] = "Contraseña debe tener mínimo 8 caracteres y un máximo de 39";
        }
    }
    return $errors;
}
*/
?>