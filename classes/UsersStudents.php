<?php


class UsersStudents
{
    public function registerStudents($tname, $cpf, $date_nasc, $email, $id_class)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM students WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO students SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email, id_class = :id_class");
            $sql->bindValue(":tname", $tname);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":date_nasc", $date_nasc);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id_class", $id_class);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function updateStudents($tname, $cpf, $date_nasc, $email, $id)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE students SET tname = :tname, cpf = :cpf, date_nasc = :date_nasc, email = :email WHERE id = :id");
        $sql->bindValue(":tname", $tname);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":date_nasc", $date_nasc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id" , $id);
        $sql->execute();
    }

    public function getAllStudents()
    {
        global $pdo;

        $array = array();

        $sql = $pdo->query("SELECT * FROM students");
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
        $sql = $pdo->prepare("SELECT * FROM students WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        }
        return $info;
    }

    public function deleteStudents($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM students WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}