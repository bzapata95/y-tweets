<?php
include_once("includes/header.php");
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
        <form>
            <input type="text" id="login" class="fadeIn second" name="nombre" placeholder="Ingresa tu nombre completo">
            <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" value="Darme de alta">
        </form>

    </div>
</div>
<?php
include_once("includes/footer.php");
?>