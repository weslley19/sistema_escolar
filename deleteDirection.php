<?php

require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersDirection.php";

$user = new UsersDirection();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user->deleteDirection($_GET['id']);

    if ($user = true) {
        echo "<p class='alert alert-warning'><b>Diretor</b> deletado com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Não foi possível excluir</p>";
    }
}
?>

<a href="getAllDirection.php"><button type="button" class="style btn btn-danger">Voltar</button></a>

<?php
require __DIR__ . "/pages/footer.php";
?>