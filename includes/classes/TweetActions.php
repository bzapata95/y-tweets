<?php

class TweetActions
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function crear($user_id, $contenido)
    {
        $query = $this->con->prepare("INSERT INTO tweets (usuario_id, contenido) VALUES (:user, :content)");
        $query->bindParam(":user", $user_id);
        $query->bindParam(":content", $contenido);
        return $query->execute();
    }

    public function actualizar($id, $contenido)
    {
        $query = $this->con->prepare("UPDATE  tweets SET contenido = :content WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->bindParam(":content", $contenido);
        return $query->execute();
    }
    public function borrar($id)
    {
        $query = $this->con->prepare("DELETE FROM tweets WHERE id = :id");
        $query->bindParam(":id", $id);
        return $query->execute();
    }
}
