<?php

require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersDocentes.php";

$user = new UsersDocentes();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user->deleteDocente($_GET['id']);

    if ($user = true) {
        echo "<p class='alert alert-warning'><b>Docente</b> deletado com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Não foi possível excluir</p>";
    }
}
?>

<a href="getAllDocente.php"><button type="button" class="style btn btn-danger">Voltar</button></a>

<?php
require __DIR__ . "/pages/footer.php";
?>