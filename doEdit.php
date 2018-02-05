<?php
if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['type'])) {
    header('Location: index.php?error=noidprovideddoEdit');
    exit;
}

require_once 'connexion.php';

$request = 'UPDATE `pokemon` SET `name` = :name, `type` = :type WHERE `id` = :id;';

$stmt = $conn->prepare($request);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':name', $_POST['name']);
$stmt->bindValue(':type', $_POST['type']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
header('Location: index.php');