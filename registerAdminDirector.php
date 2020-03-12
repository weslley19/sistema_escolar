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

    if (!empty($tname) && !empty($cpf) && !empty($date_nasc) && !empty($email) && !empty($pass)) {
        if ($user->registerDirectorAdmin($tname, $cpf, $date_nasc, $email, $pass)) {
            echo "<p>Parabens! Cadastrado com sucesso.</p>";
            echo "<a href='#'>Clique aqui para logar</a>";
        } else {
            echo "<p>Oops! Esse usuário ja existe.</p>";
        }
    } else {
        echo "<p>Preecha todos os campos</p>";
    }
}
?>
<a href="login.php">Logar</a> <br><br>

<a href="#">Voltar</a> <br><br>

<h4>Cadastro</h4>
<fieldset>
    <form method="post">
        Nome: <br>
        <input type="text" name="tname"> <br><br>
        CPF: <br>
        <input type="text" name="cpf"> <br><br>
        Data de Nascimento: <br>
        <input type="date" name="date_nasc"> <br><br>
        E-mail: <br>
        <input type="email" name="email"> <br><br>
        Senha: <br>
        <input type="password" name="pass"> <br><br>
        <input type="submit" value="Registrar-se">
    </form>
</fieldset>