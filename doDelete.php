<?php
if (!isset($_POST['id'])) {
    header('Location: index.php?error=noidprovideddodelete');
    exit;
}

require_once 'connexion.php';

$request = 'DELETE FROM `pokemon` WHERE `id` = :id;';

$stmt = $conn->prepare($request);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
header('Location: index.php');