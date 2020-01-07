<?php
include_once("includes/header.php");
?>

<div class="d-flex flex-column  justify-content-center pt-4 text-center">
    <h1 class="text-center">TweetCool </h1>
    <div class="group-form mt-2">
        <form action="index.php" method="post">
            <textarea name="content" id="contet" class="form-control" placeholder="¿Que esta pensando BRYAN ?"></textarea>
            <button class="btn btn-primary btn-block mt-3">Enviar tweet</button>
        </form>
    </div>

    <div class="cold-md-7 mt-5">
        <h4>Todos tus tweets</h4>
        <div class="container">
            <div class="card ">
                <div class="card-body d-flex flex-row align-items-center justify-content-between">
                    <span>This is some text within a card body.</span>
                    <div>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" class="btn btn-sm btn-danger">Borrar</a>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-body d-flex flex-row align-items-center justify-content-between">
                    <span>This is some text within a card body.</span>
                    <div>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" class="btn btn-sm btn-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once("includes/footer.php");
?>