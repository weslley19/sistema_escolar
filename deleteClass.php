<?php

require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UserClass.php";

$user = new UserClass();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user->deleteClass($_GET['id']);

    if ($user = true) {
        echo "<p class='alert alert-warning'><b>Turma</b> deletada com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Não foi possível excluir</p>";
    }
}
?>

<a href="getAllClass.php"><button type="button" class="style btn btn-danger">Voltar</button></a>

<?php
require __DIR__ . "/pages/footer.php";
?>