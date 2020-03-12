<?php
require __DIR__ . "/pages/header.php";
require __DIR__ . "/classes/UserDirectorAdmin.php";

$user = new UserDirectorAdmin();

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
    $id = addslashes($_POST['id']);

    if (!empty($tname) && !empty($cpf) && !empty($date_nasc) && !empty($email) && !empty($pass) && !empty($id)) {
        $user->updateDirectorAdmin($tname, $cpf, $date_nasc, $email, $pass, $id);
        if ($user = true) {
            echo "<p class='alert alert-success'><b>Admin</b> atualizado com sucesso!</p>";
            echo "<a href='index.php'><button type='button' class='style btn btn-danger'>Voltar</button></a>";
            exit;
            //header("Location: getAllDirection.php");
        } else {
            echo "<p class='alert alert-danger'><b>Oops!</b> Não foi possível atualizar.</p>";
        }
    }
}

$admins = $user->getAllDirectorAdmin();
foreach ($admins as $admin):

?>

<h1 class="title">Alterar Admin</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form method="post" class="style_form">
                <input type="hidden" name="id" value="<?= $admin['id'];?>">
                <div class="form-group">
                    <label for="exampleInputName">Nome: </label>
                    <input type="text" name="tname" value="<?= $admin['tname'];?>" class="form-control" id="exampleInputName" placeholder="Nome do diretor">
                </div>
                <div class="form-group">
                    <label for="exampleInputCpf">CPF: </label>
                    <input type="text" name="cpf" value="<?= $admin['cpf'];?>" class="form-control" id="exampleInputCpf" placeholder="CPF do diretor">
                </div>
                <div class="form-group">
                    <label for="exampleInputDate">Data de Nascimento: </label>
                    <input type="date" name="date_nasc" value="<?= $admin['date_nasc'];?>" class="form-control" id="exampleInputDate">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail: </label>
                    <input type="email" name="email" value="<?= $admin['email'];?>" class="form-control" id="exampleInputEmail1" placeholder="E-mail do diretor">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha: </label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </form>
        </div>
    </div>
</div>

<?php endforeach;


require __DIR__ . "/pages/footer.php";
?>

