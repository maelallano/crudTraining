<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=crudTrainingV2', 'root', 'root');
} catch (PDOException $exception) {
    die('NOPE ' . $exception);
}