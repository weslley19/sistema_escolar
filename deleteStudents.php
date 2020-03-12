<?php

require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersStudents.php";

$user = new UsersStudents();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user->deleteStudents($_GET['id']);

    if ($user = true) {
        echo "<p class='alert alert-warning'><b>Aluno</b> deletado com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Não foi possível excluir</p>";
    }
}
?>

<a href="getAllStudents.php"><button type="button" class="style btn btn-danger">Voltar</button></a>

<?php
require __DIR__ . "/pages/footer.php";
?>