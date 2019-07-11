<?php

abstract class InputValidator
{

    public static function validate_name($name_to_validate, $errors)
    {
        if (empty($name_to_validate)) {
            $errors[] = "Debe ingresar su nombre y su apellido!";
        }
        if (!preg_match("/^[a-zA-Z ]*$/", $name_to_validate)) {
            $errors[] = "Sólo letras y espacios";
        }
        if (strlen($name_to_validate) > 25) {
            $errors[] = "Nombre demasiado largo";
        }
        return $errors;
    }
    
    public abstract static function validate_email($email_to_validate, $errors);
    public abstract static function validate_password($password_to_validate, $errors);
    
    public static function validate_street($street_to_validate, $errors)
    {
        if (empty($street_to_validate)) {
            $errors[] = "Debe ingresar su dirección!";
        } else {
            if (!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $street_to_validate)) {
                $errors[] = "Dirección Invalida";
            }
            if (strlen($street_to_validate) > 40) {
                $errors[] = "Dirección demasiada larga";
            }
        }
        return $errors;
    }

    public static function validate_selected_value($selected_value_to_validate, $possible_values, $errors)
    {
        if (empty($selected_value_to_validate)) {
            $errors[] = "Debe ingresar un valor!";
        } else {
            $value_matched = false;
            foreach ($possible_values as $defined_value) {
                if ($selected_value_to_validate == $defined_value) {
                    $value_matched = true;
                }
            }
            if (!$value_matched) {
                $errors[] = "El valor seleccionado no corresponde a las posibles opciones";
            }
        }
        return $errors;
    }
}
