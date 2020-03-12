<?php
require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersDocentes.php";

$user = new UsersDocentes();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_POST['tname']) && !empty($_POST['cpf']) && !empty($_POST['date_nasc']) && !empty($_POST['email'])) {
    $tname = addslashes($_POST['tname']);
    $cpf = addslashes($_POST['cpf']);
    $date_nasc = addslashes($_POST['date_nasc']);
    $email = addslashes($_POST['email']);

    if (!empty($tname) && !empty($cpf) && !empty($date_nasc) && !empty($email)) {
        if ($user->registerDocente($tname, $cpf, $date_nasc, $email)) {
            echo "<p class='alert alert-success'><b>Parabens!</b> Docente cadastrado com sucesso.</p>";
        } else {
            echo "<p class='alert alert-danger'><b>Oops!</b> Esse docente já existe.</p>";
        }
    } else {
        echo "<p>Preecha todos os campos</p>";
    }
}
?>

<h1 class="title">Cadastrar Docente</h1>
<!--[ PERFIL AVATAR <?= $_SESSION['login'];?> ] <br><br>-->

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form method="post" class="style_form">
                <div class="form-group">
                    <label for="exampleInputName">Nome: </label>
                    <input type="text" name="tname" class="form-control" id="exampleInputName" placeholder="Nome do docente">
                </div>
                <div class="form-group">
                    <label for="exampleInputCpf">CPF: </label>
                    <input type="text" name="cpf" class="form-control" id="exampleInputCpf" placeholder="CPF do docente">
                </div>
                <div class="form-group">
                    <label for="exampleInputDate">Data de Nascimento: </label>
                    <input type="date" name="date_nasc" class="form-control" id="exampleInputDate">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail: </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail do docente">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="getAllDocente.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </form>
        </div>
    </div>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>