<?php
include_once("common/StaticClasses/LoginValidator.php");
// define variables and set to empty values
$email = $pass  = ""
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
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
