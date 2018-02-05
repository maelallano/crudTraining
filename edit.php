<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?error=noidprovidededit');
        exit;
    }

    require_once 'connexion.php';

    $request = 'SELECT `id` ,`name`, `type` FROM `pokemon` WHERE `id` = :id';

    $stmt = $conn->prepare($request);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page modifier</title>
</head>
<body>
    <?php require 'header.php'?>
    <form action="doEdit.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label for="name">Nom: </label> <input type="text" name="name" value="<?=$row['name']?>">
        <label for="type">Type: </label> <input type="text" name="type" value="<?=$row['type']?>">
        <input type="submit" value="Valider les modifications !">
    </form>
</body>
</html>
