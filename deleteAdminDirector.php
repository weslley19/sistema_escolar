<?php

require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UserDirectorAdmin.php";

$user = new UserDirectorAdmin();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user->deleteDirectorAdmin($_GET['id']);

    if ($user = true) {
        echo "<p>Usuário deletado com sucesso!</p>";
    } else {
        echo "<p>Não foi possível excluir</p>";
    }
}
?>

[ <a href="index.php">Voltar</a> ] <br><br>