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

<h1 class="title">TURMA +</h1>

<a href="index.php"><button type="button" class="style btn btn-info">Voltar</button></a> <br><br>

<a href="registerClass.php"><button type="button" class="style btn btn-success">Adicionar Turma</button></a> <br><br>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">NOME DA TURMA</th>
            <th scope="col">ANO</th>
            <th scope="col">DATA DE CRIAÇÃO</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        </thead>
        <tbody>

    <?php
    require __DIR__ . "/classes/UserClass.php";
    $user = new UserClass();

    $classes = $user->getAllClass();
    foreach ($classes as $class):
        ?>

        <tr>
            <td><?= $class['tname'];?></td>
            <td><?= $class['ano'];?></td>
            <td><?= $class['date_created'];?></td>
            <td>
                <a href="alterInfoClass.php?id=<?php echo $class['id']; ?>">
                    <img src="assets/images/editar.png" alt="Editar" title="Editar" width="25px" height="auto">
                </a>
                <a href="deleteClass.php?id=<?php echo $class['id']; ?>">
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