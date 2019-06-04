<?php
if($_POST["password"]=true) ){
	echo("<a>Registrarse</a><a>Log in<a/>")
  ?>
	<?php
include_once ("includes/header.php")
?>

    <section class="splash accent_bg d-flex justify-content-center align-content-center position-relative py-5">
        <div class="position-absolute back_splash1 d-none d-md-block">
            <img src="img/backSplash.png" />
        </div>
        <div class="container py-3 py-sm-5">
            <header class="row">
                <div class="col-12">
                    <h1 class="white text-center">Ingresa</h1>
                    <p class="white text-center kappa lead">Completá el siguiente formulario con tu usuario y contraseña</p>
                </div>
            </header>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-sm-8 d-flex justify-content-center align-items-center">
                    <form class="registro w-100">
                        <div class="fields white_bg p-3 p-sm-5 ">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="ejemplo@mail.com.ar">
                                <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu mail con nadie.</small>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Contraseña</label>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkBox1">
                                <label class="form-check-label" for="checkBox1">Mantenerme ingresado</label>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn_cta dark">Ingresar</button>
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
