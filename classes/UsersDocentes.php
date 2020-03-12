<?php


class UsersDocentes
{
    public function registerDocente($tname, $cpf, $date_nasc, $email)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM docente WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO docente SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email");
            $sql->bindValue(":tname", $tname);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":date_nasc", $date_nasc);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function updateDocente($tname, $cpf, $date_nasc, $email, $id)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE docente SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email WHERE id = :id");
        $sql->bindValue(":tname", $tname);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":date_nasc", $date_nasc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id" , $id);
        $sql->execute();
    }

    public function getAllDocente()
    {
        global $pdo;

        $array = array();

        $sql = $pdo->query("SELECT * FROM docente");
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
        $sql = $pdo->prepare("SELECT * FROM docente WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        }
        return $info;
    }

    public function deleteDocente($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM docente WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}