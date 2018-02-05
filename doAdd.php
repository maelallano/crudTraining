<?php
if (empty($_POST['name']) || empty($_POST['type'])) {
    header('Location: index.php?error=noidprovideddoAdd');
    exit;
}

require_once 'connexion.php';

$request = 'INSERT INTO `pokemon` (`name`, `type`) VALUES (:name, :type);';

$stmt = $conn->prepare($request);
$stmt->bindValue(':name', $_POST['name']);
$stmt->bindValue(':type', $_POST['type']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
header('Location: index.php');