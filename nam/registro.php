<?php
include_once ("includes/header.php");
include_once ("common/serverlogic/server-register.php");
include_once ("common/alerts.php"); 
?>
    <section class="splash accent_bg d-flex justify-content-center align-content-center position-relative py-5">
        <div class="position-absolute back_splash1 d-none d-md-block">
            <img src="img/backSplash.png" />
        </div>
        <div class="container py-3 py-sm-5">
            <header class="row">
                <div class="col-12">
                    <h1 class="white text-center">Registrate</h1>
                    <p class="white text-center kappa lead">Completá el siguiente formulario para poder armar tu menú</p>
                </div>
            </header>
            <div class = "alert-messages justify-content-center">
                <?php
                if($errors_found = true){
                    errors_warning_alert($register_errors);
                }
                ?>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-sm-8 d-flex justify-content-center align-items-center">
                    <form class="registro w-100" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="fields white_bg p-3 p-sm-5 ">
                            <div class="form-group">
                                <!-- Full Name -->
                                <label for="nombre" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <!-- Full Name -->
                                <label for="apellido" class="control-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido">
                            </div>
                            <div class="form-group">
                                <!-- Full Name -->
                                <label for="email" class="control-label">E-Mail</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <!-- Full Name -->
                                <label for="pass" class="control-label">Contraseña</label>
                                <input type="password" class="form-control" id="pass" name="pass">
                            </div>
                            <div class="form-group">
                                <!-- Street 2 -->
                                <label for="domicilio" class="control-label">Domicilio</label>
                                <input type="text" class="form-control" id="domicilio" name="domicilio">
                            </div>
                            <div class="form-group">
                                <!-- State Button -->
                                <label for="dieta" class="control-label">Dieta</label>
                                <select class="form-control" id="dieta">
                                <option name = "dieta" value="vega">Vegana</option>
                                <option name = "dieta" value="vege">Vegetariana</option>
                                <option name = "dieta" value="homn">Homnívora</option>
                                <option name = "dieta" value="keto">Keto</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn_cta dark">Registrate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="position-absolute back_splash2  d-none d-md-block">
            <img src="img/backSplash2.png" />
        </div>
    </section>
    <?php
include_once ("includes/footer.php")
?>