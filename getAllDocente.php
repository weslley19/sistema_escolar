<?php
require __DIR__ . "/pages/header.php";
?>
<?php
if(empty($_SESSION['login'])) {
    ?>
    <script type="text/javascript">window.location.href = "login.php";</script>
    <?php
    exit;
}
?>

<h1 class="title">DOCENTE +</h1>

<a href="index.php"><button type="button" class="style btn btn-info">Voltar</button></a> <br><br>

<a href="registerDocente.php"><button type="button" class="style btn btn-success">Adicionar Docente</button></a> <br><br>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">CPF</th>
            <th scope="col">DATA DE NASCIMENTO</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        </thead>
        <tbody>

    <?php
    require __DIR__ . "/classes/UsersDocentes.php";
    $user = new UsersDocentes();

    $docentes = $user->getAllDocente();
    foreach ($docentes as $docente):
        ?>

        <tr>
            <td><?= $docente['tname'];?></td>
            <td><?= $docente['cpf'];?></td>
            <td><?= $docente['date_nasc'];?></td>
            <td>
                <a href="alterInfoDocente.php?id=<?php echo $docente['id']; ?>">
                    <img src="assets/images/editar.png" alt="Editar" title="Editar" width="25px" height="auto">
                </a>
                <a href="deleteDocente.php?id=<?php echo $docente['id']; ?>">
                    <img src="assets/images/lixeira.png" alt="Excluir" title="Excluir" width="25px" height="auto">
                </a>
            </td>
        </tr>

    <?php endforeach; ?>
        </tbody>
</table>
</div>

<?php
require __DIR__ . "/pages/footer.php";
?>