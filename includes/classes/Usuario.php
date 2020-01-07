<?php

class Usuario
{

    private $sqlData;

    public function __construct($con, $usuario)
    {
        $this->con = $con;

        $query = $con->prepare("SELECT * FROM  usuarios WHERE usuario = :usuario");
        $query->bindParam(":usuario", $usuario);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function estaLogeado()
    {
        return isset($_SESSION["usuarioLogeado"]);
    }

    public function getId()
    {
        return $this->sqlData["id"];
    }

    public function getNombre()
    {
        return $this->sqlData["nombreCompleto"];
    }
    public function getUsuario()
    {
        return $this->sqlData["usuario"];
    }

    public function getTweets()
    {
        $id = $this->getId();

        $query = $this->con->prepare("SELECT * FROM  tweets WHERE usuario_id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $tweets = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $tweet = new Tweet($this->con, $row);
            array_push($tweets, $tweet);
        }

        return $tweets;
    }
}
