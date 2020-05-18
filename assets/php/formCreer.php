<?php
$titre = htmlspecialchars($_POST['titre']);
$type = htmlspecialchars($_POST['type']);
$description = htmlspecialchars($_POST['description']);
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$mail = htmlspecialchars($_POST['mail']);

try {
    $pdo = new PDO('sqlite:../../database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->query(
        'CREATE TABLE IF NOT EXISTS annonces (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                titre VARCHAR(32) NOT NULL,
                type VARCHAR(16) NOT NULL,
                description TEXT NOT NULL,
                first_name VARCHAR(32) NOT NULL,
                last_name VARCHAR(32) NOT NULL,
                mail VARCHAR(64) NOT NULL
            )'
    );

    if  (preg_match('/^[\S]{1,50}$/', $titre) &&
        $type &&
        $description !== '' &&
        preg_match('/^[\S]{1,50}$/', $firstName) &&
        preg_match('/^[\S]{1,50}$/', $lastName) &&
        preg_match('/^[0-9a-z.-_]+@[0-9a-z.-_]{3,32}\.[a-z]{2,}$/', $mail)) {

        $statement = $pdo->prepare(
            'INSERT INTO annonces (titre, type, description, first_name, last_name, mail) VALUES (:titre, :type, :description, :first_name, :last_name, :mail)'
        );
        $statement->bindValue('titre', $titre, PDO::PARAM_STR);
        $statement->bindValue('type', $type, PDO::PARAM_STR);
        $statement->bindValue('description', $description, PDO::PARAM_STR);
        $statement->bindValue('first_name', $firstName, PDO::PARAM_STR);
        $statement->bindValue('last_name', $lastName, PDO::PARAM_STR);
        $statement->bindValue('mail', $mail, PDO::PARAM_STR);
        $statement->execute();
    }
} catch (PDOException $exception) {
    var_dump($exception);
}
