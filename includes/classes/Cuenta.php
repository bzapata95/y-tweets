<?php

class Cuenta
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function login($usuario, $password)
    {
        $query = $this->con->prepare("SELECT * FROM usuarios WHERE usuario = :user");
        $query->bindParam(":user", $usuario);
        $query->execute();

        if ($query->rowCount() == 1) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $passwordHashed = $row["password"];

            if (password_verify($password, $passwordHashed)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function registrar($nombre, $usuario, $password)
    {
        $success = $this->insertarDB($nombre, $usuario, $password);

        if ($success) {
            return true;
        } else {
            return false;
        }
    }

    private function insertarDB($n, $u, $p)
    {
        $option = array(
            'cost' => 10
        );

        $passHashed = password_hash($p, PASSWORD_BCRYPT, $option);

        $query = $this->con->prepare("INSERT INTO usuarios (nombreCompleto, usuario, password) VALUES (:nombre, :usuario, :pass)");
        $query->bindParam(":nombre", $n);
        $query->bindParam(":usuario", $u);
        $query->bindParam(":pass", $passHashed);

        return $query->execute();
    }
}
