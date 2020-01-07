<?php
include_once("includes/header.php");
include_once("includes/classes/TweetActions.php");
include_once("includes/classes/Tweet.php");

if (!Usuario::estaLogeado()) {
    header("Location: entrar.php");
}

$newTweetActions = new TweetActions($con);


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $newTweet = new Tweet($con, $id);
}

if (isset($_POST["sendTweet"])) {
    $id = $_POST["id"];
    $contenido = $_POST["contenido"];

    $success = $newTweetActions->actualizar($id, $contenido);

    if ($success) {
        header("Location: index.php");
    }
}


?>

<div class="d-flex flex-column  justify-content-center pt-4 text-center">
    <h1 class="text-center">TweetCool</h1>
    <div class="group-form mt-2">
        <form action="editar.php" method="post">
            <textarea name="contenido" id="contenido" class="form-control" placeholder="¿Que esta pensando <?php echo $usuarioData->getNombre() ?>  ?"><?php echo $newTweet->getContenido() ?></textarea>
            <input type="hidden" name="id" value="<?php echo $newTweet->getId() ?>">
            <button type="submit" name="sendTweet" class="btn btn-primary btn-block mt-3">Editar tweet</button>
        </form>
    </div>
</div>

<?php
include_once("includes/footer.php");
?>