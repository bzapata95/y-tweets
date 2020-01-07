<?php
include_once("config.php");
include_once("classes/Usuario.php");

$usuarioLogeado = Usuario::estaLogeado() ? $_SESSION["usuarioLogeado"] : "";
$usuarioData = new Usuario($con, $usuarioLogeado);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TweetCool</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>

    <div class="container">