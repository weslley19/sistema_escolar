<?php
require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UserClass.php";

$user = new UserClass();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_POST['tname']) && !empty($_POST['ano']) && !empty($_POST['date_created'])) {
    $tname = addslashes($_POST['tname']);
    $ano = addslashes($_POST['ano']);
    $date_created = addslashes($_POST['date_created']);

    if (!empty($tname) && !empty($ano) && !empty($date_created)) {
        if ($user->registerClass($tname, $ano, $date_created)) {
            echo "<p class='alert alert-success'><b>Parabens!</b> Turma cadastrada com sucesso.</p>";
        } else {
            echo "<p class='alert alert-danger'>Oops! Esse usuário ja existe.</p>";
        }
    } else {
        echo "<p>Preecha todos os campos</p>";
    }
}
?>


<h1 class="title">Cadastrar Turma</h1>
<!--[ PERFIL AVATAR <?= $_SESSION['login'];?> ] <br><br>-->

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form method="post" class="style_form">
                <div class="form-group">
                    <label for="exampleInputName">Nome: </label>
                    <input type="text" name="tname" class="form-control" id="exampleInputName" placeholder="Nome da turma">
                </div>
                <div class="form-group">
                    <label for="exampleInputAno">Ano: </label>
                    <input type="text" name="ano" class="form-control" id="exampleInputAno" placeholder="Ano">
                </div>
                <div class="form-group">
                    <label for="exampleInputDate">Data de Criação: </label>
                    <input type="date" name="date_created" class="form-control" id="exampleInputDate">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="getAllClass.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </form>
        </div>
    </div>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>
