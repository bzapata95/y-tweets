<?php
include_once("includes/header.php");
include_once("includes/classes/Cuenta.php");

$newCuenta = new Cuenta($con);


if (isset($_POST["submitButton"])) {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $listo = $newCuenta->registrar($nombre, $usuario, $password);

    if ($listo) {
        header("Location:  index.php");
    } else {
        echo "ANDA ALGO MAL";
    }
}


?>

<div class="wrapper fadeInDown d-flex justify-content-center align-items-center">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first ">
            <h1 class="mt-4">TweetCool</h1>
            <small>Registrate</small>
        </div>

        <!-- Login Form -->
        <form action="registro.php" method="POST">
            <input type="text" id="login" class="fadeIn second" name="nombre" placeholder="Ingresa tu nombre completo">
            <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" name="submitButton" value="Darme de alta">
        </form>

    </div>
</div>
<?php
include_once("includes/footer.php");
?>