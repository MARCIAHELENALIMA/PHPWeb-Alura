<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
}
