<?php


class UserDirectorAdmin
{
    public function registerDirectorAdmin($tname, $cpf, $date_nasc, $email, $pass)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM admin_director WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO admin_director SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email, pass = :pass");
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

    public function updateDirectorAdmin($tname, $cpf, $date_nasc, $email, $pass, $id)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE admin_director SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email, pass = :pass WHERE id = :id");
        $sql->bindValue(":tname", $tname);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":date_nasc", $date_nasc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":pass", md5($pass));
        $sql->bindValue(":id" , $id);
        $sql->execute();
    }

    public function getAllDirectorAdmin()
    {
        global $pdo;

        $array = array();

        $sql = $pdo->query("SELECT * FROM admin_director");
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
        $sql = $pdo->prepare("SELECT * FROM admin_director WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        }
        return $info;
    }

    public function deleteDirectorAdmin($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM admin_director WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function login($email, $pass)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM admin_director WHERE email = :email AND pass = :pass");
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
    }
}