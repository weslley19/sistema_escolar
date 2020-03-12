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

<h1 class="title">ESTUDANTE +</h1>

<a href="index.php"><button type="button" class="style btn btn-info">Voltar</button></a> <br><br>

<a href="registerStudents.php"><button type="button" class="style btn btn-success">Adicionar Estudante</button></a> <br><br>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">CPF</th>
            <th scope="col">DATA DE NASCIMENTO</th>
            <th>Turma</th>
            <th scope="col">OPÇÕES</th>
        </tr>
        </thead>
        <tbody>
    <?php
    require __DIR__ . "/classes/UsersStudents.php";
    $user = new UsersStudents();

    $students = $user->getAllStudents();
    foreach ($students as $student):
        ?>

        <tr>
            <td><?= $student['tname'];?></td>
            <td><?= $student['cpf'];?></td>
            <td><?= $student['date_nasc'];?></td>
            <td><?= $student['id_class'];?></td>
            <td>
                <a href="alterInfoStudents.php?id=<?php echo $student['id']; ?>">
                    <img src="assets/images/editar.png" alt="Editar" title="Editar" width="25px" height="auto">
                </a>
                <a href="deleteStudents.php?id=<?php echo $student['id']; ?>">
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