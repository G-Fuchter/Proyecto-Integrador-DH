<?php
include_once("common/StaticClasses/LoginValidator.php");
include_once("common/Services/DBService.php");
include_once("common/serverlogic/database-service.php");
// define variables and set to empty values
$email = $pass  = "";
$login_errors = [];
$errors_found = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $pass = test_input($_POST["password"]);
  $login_errors = LoginValidator::validate_email($email, $login_errors);
  $login_errors = LoginValidator::validate_password($pass, $login_errors);
  if(sizeof($login_errors) > 0){ // Si hay errores
    $errors_found = true;
  }else{ // Si no hay errores
    $errors_found = false;
    $login_errors= validateUserLogin($email, $pass, $login_errors);
    if(sizeof($login_errors) > 0){
      $errors_found = true;
    }
  }
}

function validateUserLogin($email, $password, $login_errors) {
  $db = DBService::getInstance();
  $user = $db->getUserWithEmail($email);
  echo($user->getPassword());
  if(isset($user)){
    if(password_verify($password, $user->getPassword())){
      LoggerService::log($user->getName());
      $_SESSION["session-user"] = $user;
      $_SESSION["user-logged"] = true;
      return[];
    }else{
      $_SESSION["user-logged"] = false;
      $login_errors[] = "Password invalido";
    }
  }else{
    $_SESSION["user-logged"] = false;
    $login_errors[] = "Email invalido";
  }

  return $login_errors;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
