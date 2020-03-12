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
    $id = $_GET['id'];

    if (!empty($tname) && !empty($date_created)) {
        $user->updateClass($tname, $ano, $date_created, $id);
        if ($user = true) {
            echo "<p class='alert alert-success'><b>Turma</b> atualizada com sucesso!</p>";
            echo "<a href='getAllClass.php'><button type='button' class='style btn btn-danger'>Voltar</button></a>";
            exit;
            //header("Location: getAllDirection.php");
        } else {
            echo "<p class='alert alert-danger'>Oops! Não foi possível atualizar.</p>";
        }
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $user->getInfo($_GET['id']);
}


?>

<h1 class="title">Alterar Turma</h1>
<!--[ PERFIL AVATAR <?= $_SESSION['login'];?> ] <br><br>-->

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form method="post" class="style_form">
                <div class="form-group">
                    <label for="exampleInputName">Nome: </label>
                    <input type="text" name="tname" value="<?= $info['tname'];?>" class="form-control" id="exampleInputName" placeholder="Nome da turma">
                </div>
                <div class="form-group">
                    <label for="exampleInputAno">Ano: </label>
                    <input type="text" name="ano" value="<?= $info['ano'];?>" class="form-control" id="exampleInputAno" placeholder="Ano da turma">
                </div>
                <div class="form-group">
                    <label for="exampleInputDate">Data de Criação: </label>
                    <input type="date" name="date_created" value="<?= $info['date_created'];?>" class="form-control" id="exampleInputDate">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="getAllClass.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </form>
        </div>
    </div>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>