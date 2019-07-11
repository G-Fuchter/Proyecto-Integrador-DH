<?php
include_once("common/AbstractModels/InputValidator.php");

class LoginValidator extends InputValidator {

    public static function validate_email($email_to_validate, $errors)
    {
        if (empty($email_to_validate)) {
            $errors[] = "Debe ingresar su email!";
        } else {
            if (!filter_var($email_to_validate, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalido";
            }
            if (strlen($email_to_validate) > 40) {
                $errors[] = "Email demasiado largo";
            }
        }
        return $errors;
    }

    public static function validate_password($password_to_validate, $errors)
    {
        if (empty($password_to_validate)) {
            $errors[] = "Debe ingresar una contraseña!";
        } else {
            if (strlen($password_to_validate) > 50 || strlen($password_to_validate) < 8) {
                $errors[] = "Contraseña debe tener mínimo 8 caracteres y un máximo de 50";
            }
        }
        return $errors;
    }

}