<?php
require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UsersDirection.php";

$user = new UsersDirection();

if (empty($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_POST['tname']) && !empty($_POST['cpf']) && !empty($_POST['date_nasc']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
    $tname = addslashes($_POST['tname']);
    $cpf = addslashes($_POST['cpf']);
    $date_nasc = addslashes($_POST['date_nasc']);
    $email = addslashes($_POST['email']);
    $pass = addslashes($_POST['pass']);
    $id = $_GET['id'];

    if (!empty($tname) && !empty($cpf) && !empty($date_nasc) && !empty($email) && !empty($pass) && !empty($id)) {
        $user->updateDirection($tname, $cpf, $date_nasc, $email, $pass, $id);
        if ($user = true) {
            echo "<p class='alert alert-success'><b>Diretor</b> atualizado com sucesso!</p>";
            echo "<a href='getAllDirection.php'><button type='button' class='style btn btn-danger'>Voltar</button></a>";
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

<h1 class="title">Alterar Direção</h1>
<!--[ PERFIL AVATAR <?= $_SESSION['login'];?> ] <br><br>-->

<div class="container">
    <div class="row">
        <div class="col-sm-5">
        <form method="post" class="style_form">
            <div class="form-group">
                <label for="exampleInputName">Nome: </label>
                <input type="text" name="tname" value="<?= $info['tname'];?>" class="form-control" id="exampleInputName" placeholder="Nome do diretor">
            </div>
            <div class="form-group">
                <label for="exampleInputCpf">CPF: </label>
                <input type="text" name="cpf" value="<?= $info['cpf'];?>" class="form-control" id="exampleInputCpf" placeholder="CPF do diretor">
            </div>
            <div class="form-group">
                <label for="exampleInputDate">Data de Nascimento: </label>
                <input type="date" name="date_nasc" value="<?= $info['date_nasc'];?>" class="form-control" id="exampleInputDate">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail: </label>
                <input type="email" name="email" value="<?= $info['email'];?>" class="form-control" id="exampleInputEmail1" placeholder="E-mail do diretor">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha: </label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Senha">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="getAllDirection.php"><button type="button" class="btn btn-danger">Voltar</button></a>
        </form>
        </div>
    </div>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>

