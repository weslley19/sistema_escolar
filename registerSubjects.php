<?php
require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersSubjects.php";

$user = new UsersSubjects();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_POST['tname']) && !empty($_POST['date_created'])) {
    $tname = addslashes($_POST['tname']);
    $date_created = addslashes($_POST['date_created']);

    if (!empty($tname) && !empty($date_created)) {
        if ($user->registerSubjects($tname, $date_created)) {
            echo "<p class='alert alert-success'><b>Parabens!</b> Disciplina cadastrada com sucesso.</p>";
        } else {
            echo "<p class='alert alert-danger'>Oops! Esse usuário ja existe.</p>";
        }
    } else {
        echo "<p>Preecha todos os campos</p>";
    }
}
?>

<h1 class="title">Cadastrar Disciplina</h1>
<!--[ PERFIL AVATAR <?= $_SESSION['login'];?> ] <br><br>-->

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form method="post" class="style_form">
                <div class="form-group">
                    <label for="exampleInputName">Nome: </label>
                    <input type="text" name="tname" class="form-control" id="exampleInputName" placeholder="Nome da disciplina">
                </div>
                <div class="form-group">
                    <label for="exampleInputDate">Data de Criação: </label>
                    <input type="date" name="date_created" class="form-control" id="exampleInputDate">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="getAllSubjects.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </form>
        </div>
    </div>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>