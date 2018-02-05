<?php
    require_once 'connexion.php';

    $request = 'SELECT `id`, `name`, `type` FROM `pokemon`;';

    $stmt = $conn->prepare($request);
    $stmt->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>curdTrainingV2 index</title>
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
<?php
if (isset($_GET['error'])) {
    ?>
    <div style="color: red"><?=$_GET['error']?></div>
    <?php
}
?>
    <h1>pokemon CRUD</h1>
    <a href="add.php">Ajoutez un pokemon en cliquant ici !</a>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>type</th>
            <th>action</th>
        </tr>
        <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?=$row['id']?></td>
                <td><a href="details.php?id=<?=$row['id']?>"><?=$row['name']?></a></td>
                <td><?=$row['type']?></td>
                <td>
                    <a href="edit.php?id=<?=$row['id']?>">modifier</a>
                    <a href="delete.php?id=<?=$row['id']?>">supprimer</a>
                </td>
            </tr>
        <?php endwhile;?>
    </table>
</body>
</html>
