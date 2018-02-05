<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?error=noidprovideddetails');
        exit;
    }

    require_once 'connexion.php';

    $request = 'SELECT `id`, `name`, `type` FROM `pokemon` WHERE `id` = :id;';

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
    <title>Details de <?=$row['name']?></title>
    <style>
        table {
            width: 600px;
            margin-top: 20px;
        }

        td, th {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }

        h1 {
            font-size: 30px;
            font-weight: 900;
        }
    </style>
</head>
<body>
    <h1><?=$row['name']?></h1>
    <?php require 'header.php' ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>type</th>
            <th>action</th>
        </tr>
        <tr>
            <td><?=$row['id']?></td>
            <td><a href="details.php?id=<?=$row['id']?>"><?=$row['name']?></a></td>
            <td><?=$row['type']?></td>
            <td>
                <a href="edit.php?id=<?=$row['id']?>">modifier</a>
                <a href="delete.php?id=<?=$row['id']?>">supprimer</a>
            </td>
        </tr>
</body>
</html>
