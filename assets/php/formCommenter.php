<?php
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$commentaire = htmlspecialchars($_POST['commentaire']);
$idAnnonce = htmlspecialchars($_GET['id']);

try {
    $pdo = new PDO('sqlite:../../database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->query(
        'CREATE TABLE IF NOT EXISTS commentaires (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                first_name VARCHAR(32) NOT NULL,
                last_name VARCHAR(32) NOT NULL,
                commentaire TEXT NOT NULL,
                id_annonce INTEGER
            )'
    );

    if  (preg_match('/^[\S]{1,50}$/', $firstName) &&
        preg_match('/^[\S]{1,50}$/', $lastName) &&
        $commentaire !== '' &&
        $idAnnonce !== 0) {

        $statement = $pdo->prepare(
            'INSERT INTO commentaires (first_name, last_name, commentaire, id_annonce) VALUES (:first_name, :last_name, :commentaire, :id_annonce)'
        );
        $statement->bindValue('first_name', $firstName, PDO::PARAM_STR);
        $statement->bindValue('last_name', $lastName, PDO::PARAM_STR);
        $statement->bindValue('commentaire', $commentaire, PDO::PARAM_STR);
        $statement->bindValue('id_annonce', $idAnnonce, PDO::PARAM_INT);
        $statement->execute();
    }
} catch (PDOException $exception) {
    var_dump($exception);
}
