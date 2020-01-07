<?php

class Tweet
{
    private $con, $sqlData;

    public function __construct($con, $input)
    {
        $this->con = $con;

        if (!is_array($input)) {
            $query  = $con->prepare("SELECT * FROM tweets WHERE id = :id");
            $query->bindParam(":id", $input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        } else {
            $this->sqlData = $input;
        }
    }

    public function getId()
    {
        return $this->sqlData["id"];
    }

    public function getUserId()
    {
        return $this->sqlData["usuario_id"];
    }

    public function getContenido()
    {
        return $this->sqlData["contenido"];
    }


    public function getNombreUsuario()
    {
        $id = $this->getUserId();

        $query = $this->con->prepare("SELECT nombreCompleto FROM usuarios WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result["nombreCompleto"];
    }
}
