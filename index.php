<?php
include_once("includes/header.php");
include_once("includes/classes/TweetActions.php");
include_once("includes/classes/Tweet.php");

if (!Usuario::estaLogeado()) {
    header("Location: entrar.php");
}

$newTweetActions = new TweetActions($con);

if (isset($_POST["sendTweet"])) {
    $id = $usuarioData->getId();
    $contenido = $_POST["contenido"];

    $success = $newTweetActions->crear($id, $contenido);

    if ($success) {
        header("Location: index.php");
    }
}

if (isset($_POST["buttonDelete"])) {
    $id = $_POST["id"];
    $success = $newTweetActions->borrar($id);
    if ($success) {
        header("Location: index.php");
    }
}

?>

<div class="d-flex flex-column  justify-content-center pt-4 text-center">
    <h1 class="text-center">TweetCool</h1>
    <div class="group-form mt-2">
        <form action="index.php" method="post">
            <textarea name="contenido" id="contenido" class="form-control" placeholder="¿Que esta pensando <?php echo $usuarioData->getNombre() ?>  ?"></textarea>
            <button type="submit" name="sendTweet" class="btn btn-primary btn-block mt-3">Enviar tweet</button>
        </form>
    </div>

    <div class="cold-md-7 mt-5">
        <h4>Todos tus tweets</h4>
        <div class="container">
            <?php

            foreach ($usuarioData->getTweets() as $tweet) { ?>
                <div class="card ">
                    <div class="card-body d-flex flex-row align-items-center justify-content-between">
                        <span><?php echo $tweet->getContenido() ?></span>
                        <p><?php echo $tweet->getNombreUsuario() ?></p>
                        <div>
                            <a href="editar.php?id=<?php echo $tweet->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="index.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $tweet->getId() ?>">
                                <button type="submit" name="buttonDelete" class="btn btn-sm btn-danger">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div> <?php }

                        ?> </div>
    </div>
</div> <?php
        include_once("includes/footer.php");
        ?>