<?php
//require __DIR__ . "/pages/header.php";
require __DIR__ . "/configuration.php";
require __DIR__ . "/classes/UserDirectorAdmin.php";

$user = new UserDirectorAdmin();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $pass = addslashes($_POST['pass']);

        if ($user->login($email, $pass)) {

            echo '<script>window.location.href="./";</script>';

        } else {
            echo "<p class='alert alert-warning'>Usuário e/ou senha errados!</p>";
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br" class="html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Station</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="grandient">

<img src="assets/images/logo.png" class="style_logo" alt="Edu Station" title="Edu Station">

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail: </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Seu e-mail:">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha: </label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Sua senha:">
                </div>
                <br>
                <button type="submit" class="style_button_login btn btn-primary">FAZER LOGIN</button>
            </form>
            <a href="registerAdminDirector.php"><small>Primeira vez aqui?</small></a>
        </div>
    </div>
</div>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>