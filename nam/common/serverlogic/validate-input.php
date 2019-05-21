<?php
/**
 * Returns any errors, if there are any.
 */
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
