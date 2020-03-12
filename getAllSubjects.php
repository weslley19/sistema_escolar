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

<h1 class="title">DISCIPLIINA +</h1>

<a href="index.php"><button type="button" class="style btn btn-info">Voltar</button></a> <br><br>

<a href="registerSubjects.php"><button type="button" class="style btn btn-success">Adicionar Disiciplina</button></a> <br><br>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">DATA DE CRIAÇÃO</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        </thead>
        <tbody>

    <?php
    require __DIR__ . "/classes/UsersSubjects.php";
    $user = new UsersSubjects();

    $subjects = $user->getAllSubjects();
    foreach ($subjects as $subject):
        ?>

        <tr>
            <td><?= $subject['tname'];?></td>
            <td><?= $subject['date_created'];?></td>
            <td>
                <a href="alterInfoSubjects.php?id=<?php echo $subject['id']; ?>">
                    <img src="assets/images/editar.png" alt="Editar" title="Editar" width="25px" height="auto">
                </a>
                <a href="deleteSubjects.php?id=<?php echo $subject['id']; ?>">
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