<?php
require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UserDirectorAdmin.php";

$user = new UserDirectorAdmin();

    if (empty($_SESSION['login'])) {
        session_destroy();
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Station</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <h1 class="title">Direção WorkStation</h1>

<br><br>

<nav class="option_info">
    <a href="getAllDirection.php">Direção</a>
    <a href="getAllDocente.php">Docente</a>
    <a href="getAllStudents.php">Aluno</a>
    <a href="getAllSubjects.php">Disciplina</a>
    <a href="getAllClass.php">Turma</a>
</nav>


    <?php
    require __DIR__ . "/pages/footer.php";
    ?>
