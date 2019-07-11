<?php
function addUser($user, $path){
    $json_content = file_get_contents($path);
    $users = json_decode($json_content,true);

    $users[] = $user;
    $json_data = json_encode($users);
    file_put_contents($path, $json_data);
}

function getUser($email, $path){
    $json_content = file_get_contents($path);
    $users = json_decode($json_content,true);
    foreach($users as $user){
        if($user["email"] == $email){
            return $user;
        }
    }
}

function checkIfUserExists($user, $path){
    $json_content = file_get_contents($path);
    $users = json_decode($json_content,true);
    foreach($users as $u){
        if($u == $user){
            return true;
        }
    }
    return false;
}

function checkIfEmailHasBeenRegistered($email, $path){
    $json_content = file_get_contents($path);
    $users = json_decode($json_content,true);
    foreach($users as $u){
        if($u["email"] == $email){
            return true;
        }
    }
    return false;
}
/**
 * @param email es el mail del usuario
 * @param password es el password el usuario
 * @param path es donde se encuentra el archivo con los usuarios (tomar en cuenta desde que archivo lo estas usando)
 * @return boolean True si se pudo loguear, false si no existe la cuenta o el password es incorrecto
 */
function login($email, $password, $path){
    $json_content = file_get_contents($path);
    $users = json_decode($json_content,true);
    foreach($users as $u){
        if($u["email"] == $email){
            if($u["pass"] == $password){
                return true;
            }else{
                return false;
            }
        }
    }
    return false;
}

class LoggerService {

    public static function log (string $message) {
        $json_content = file_get_contents("log.json");
        $logs = json_decode($json_content,true);
        $logs[] = $message;
        $json_data = json_encode($logs);
        file_put_contents("log.json", $json_data);
    }

}
?>