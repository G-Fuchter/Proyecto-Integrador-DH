<?php
//ESTAN LOS CAMPOS DE DATOS COMPLETOS?

function parameterExist($name, $arrayLive){
  return array_key_exists($name, $arrayLive);
}

function returnInfo($name, $arrayLive, $default = null) {
  if (parameterExist($name, $arrayLive) && !empty($arrayLive[$name])) {
    return $arrayLive[$name];
  }

  return $default;
}

//VALIDAR SI AVATAR SUBIO BIEN
function isImageOk($name) {
  if (parameterExist($name, $_FILES) && $_FILES[$name]['error'] === UPLOAD_ERR_OK) {
    return true;
  }
  return false;
};

//EXISTE EL usuario, ARCHIVO VACIO

function emailUser($email){
  $users = json_decode(file_get_contents('usuarios.json'),true);
  if (is_null($users)) {
    $users = ['users' => []];
  }

//VERIFICAR Email, ARCHIVOS CON DATOS
$exist = false;
$position = null;
$foundUser = null;
$nextId = 0;

foreach ($users['users'] as $key => $value) {
  if ($value['email'] == $email){
    $exist = true;
    $position = $key;
    $foundUser = $value;
  }

  if ($nextId < $value['id']){
    $nextId = $value['id'];
  }else{
    $nextId = $nextId;
  }
}

  return [
    'exist' => $exist,
    'position' => $position,
    'user' => $foundUser,
    'nextId' => $nextId
  ];
}

//GUARDAR usuario en Json

function saveUser($user) {
  $users = json_decode(file_get_contents('usuarios.json'),true);
  if (is_null($users)) {
    $users = ['users' => []];
  }

  $users['users'][] = $user;
  file_put_contents('usuarios.json', json_encode($users, JSON_PRETTY_PRINT));
}

//GUARDAR AVATAR
function saveFile($photo, $user) {
  if (array_key_exists($photo, $_FILES)) {
    $file = $_FILES[$photo];
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    $directory = "./fotos/";

    if(!file_exists($directory)) {
      $old = umask(0);
      mkdir($directory, 0777);
      umask($old);
    }

    $date = new DateTime();

    $finalPhoto = $directory .$user. "_imagen_".$date->getTimestamp()."." . $ext;

    move_uploaded_file($tmp, $finalPhoto);

    return $finalPhoto;
  }
}


?>
