<?php
session_start();

global $pdo;

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=sistema_escolar",
        "root",
        ""
    );
} catch (PDOException $exception) {
    echo "Erro: ".$exception->getMessage();
    exit;
}
