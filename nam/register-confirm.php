<?php
session_start();
include_once("common/serverlogic/database-service.php");
$user = getUser("gpfuchter@gmail.com","users.json");
include_once("includes/header.php");
?>

<body>
    <br>
    <h1> Se ha registrado exitosamente, pruebe ingresar a su cuenta</h1>
</body>

<?php
include_once("includes/footer.php");
?>