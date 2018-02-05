<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddelete');
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
    <title>Supprimer <?=$row['name']?> ?</title>
</head>
<body>
    <h1>Voulez-vous vraiment supprimer <?=$row['name']?> de votre pokedex ?</h1>
    <a href="index.php">NON C'ÉTAIT UNE ERREUR STP</a>
    <form action="doDelete.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>"><br>
        <input type="submit" value="OUI JE M'EN FOUS MOUAHAHAHAH">
    </form>
</body>
</html>
