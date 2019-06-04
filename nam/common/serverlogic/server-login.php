<?php
include_once("validate-input.php");
// define variables and set to empty values
$email = $pass  = "";
$register_errors = [];
$errors_found = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $pass = test_input($_POST["password"]);
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
