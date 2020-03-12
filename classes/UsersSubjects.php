<?php


class UsersSubjects
{
    public function registerSubjects($tname, $date_created)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM subject WHERE tname = :tname");
        $sql->bindValue(":tname", $tname);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO subject SET tname = :tname, date_created = :date_created");
            $sql->bindValue(":tname", $tname);
            $sql->bindValue(":date_created", $date_created);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function updateSubjects($tname, $date_created, $id)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE subject SET tname = :tname, date_created = :date_created WHERE id = :id");
        $sql->bindValue(":tname", $tname);
        $sql->bindValue(":date_created", $date_created);
        $sql->bindValue(":id" , $id);
        $sql->execute();
    }

    public function getAllSubjects()
    {
        global $pdo;

        $array = array();

        $sql = $pdo->query("SELECT * FROM subject");
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
        $sql = $pdo->prepare("SELECT * FROM subject WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
        }
        return $info;
    }

    public function deleteSubjects($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM subject WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}