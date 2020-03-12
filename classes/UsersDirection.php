<?php


class UsersDirection
{
    public function register($tname, $cpf, $date_nasc, $email, $pass)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM direction WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO direction SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email, pass = :pass");
            $sql->bindValue(":tname", $tname);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":date_nasc", $date_nasc);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":pass", md5($pass));
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function updateDirection($tname, $cpf, $date_nasc, $email, $pass, $id)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE direction SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email, pass = :pass WHERE id = :id");
        $sql->bindValue(":tname", $tname);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":date_nasc", $date_nasc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pass", md5($pass));
        $sql->bindValue(":id" , $id);
        $sql->execute();
    }

    public function getAll()
    {
        global $pdo;

        $array = array();

        $sql = $pdo->query("SELECT * FROM direction");
        //$sql->bindValue(":id", $_SESSION['id']);
        //$sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getInfo($id)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM direction WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        }
        return $info;
    }

    public function deleteDirection($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM direction WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    /*public function login($email, $pass)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM direction WHERE email = :email AND pass = :pass");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pass", md5($pass));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();

            $_SESSION['login'] = $info['id'];

            return true;
        } else {
            return false;
        }
    }*/
}