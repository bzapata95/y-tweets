<?php
include_once("includes/header.php");
include_once("includes/classes/Cuenta.php");


$newCuenta = new Cuenta($con);

if (isset($_POST["login"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $listo = $newCuenta->login($usuario, $password);

    if ($listo) {
        header("Location: index.php");
    } else {
        echo "CREDENCIALES INCORRECTOS";
    }
}
?>

<div class="wrapper fadeInDown d-flex justify-content-center align-items-center">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first ">
            <h1 class="mt-4">TweetCool</h1>
            <small>Inicia sessión</small>
        </div>

        <!-- Login Form -->
        <form action="entrar.php" method="POST">
            <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" name="login" value="Iniciar sesión">
        </form>

    </div>
</div>
<?php
include_once("includes/footer.php");
?>