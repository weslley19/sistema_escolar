<?php


class UserClass
{
    public function registerClass($tname, $ano, $date_created)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM class WHERE tname = :tname");
        $sql->bindValue(":tname", $tname);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO class SET tname = :tname, ano = :ano, date_created = :date_created");
            $sql->bindValue(":tname", $tname);
            $sql->bindValue(":ano", $ano);
            $sql->bindValue(":date_created", $date_created);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function updateClass($tname, $ano, $date_created, $id)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE class SET tname = :tname, ano = :ano, date_created = :date_created WHERE id = :id");
        $sql->bindValue(":tname", $tname);
        $sql->bindValue(":ano", $ano);
        $sql->bindValue(":date_created", $date_created);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getAllClass()
    {
        global $pdo;

        $array = array();

        $sql = $pdo->query("SELECT * FROM class");
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
        $sql = $pdo->prepare("SELECT * FROM class WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        }
        return $info;
    }

    public function deleteClass($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM class WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}