<?php
require __DIR__ . "/../configuration.php"
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

    <header>
        <nav class="main_menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <a class="logo" href="./">
                            <img src="assets/images/logo.png" alt="EduStation" title="EduStation">
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a href="alterAdminDirector.php">
                            <img src="assets/images/avatar.png" width="32px" height="auto" alt="Editar" title="Editar">
                        </a>
                        <a href="exit.php"><button type="button" class="btn btn-danger">Sair</button></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

<?php
require __DIR__ . "/footer.php";
?>



