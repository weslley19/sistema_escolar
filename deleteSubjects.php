<?php

require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersSubjects.php";

$user = new UsersSubjects();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user->deleteSubjects($_GET['id']);

    if ($user = true) {
        echo "<p class='alert alert-warning'><b>Disciplina</b> deletada com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Não foi possível excluir</p>";
    }
}
?>

<a href="getAllSubjects.php"><button type="button" class="style btn btn-danger">Voltar</button></a>

<?php
require __DIR__ . "/pages/footer.php";
?>