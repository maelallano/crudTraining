<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajoutez un pokémon de votre choix !</title>
</head>
<body>
    <?php require 'header.php' ?><br><br>
    <form action="doAdd.php" method="post">
        <label for="name">nom: </label> <input type="text" name="name" placeholder=" Entrer le nom ici."><br>
        <label for="type">type: </label> <input type="text" name="type" placeholder=" Entrer le type ici."><br>
        <input type="submit" value="add">
    </form>
</body>
</html>

