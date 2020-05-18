<?php
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

try {
    $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if  ($firstName !== '' && $lastName !== '' && $subject !== '' && $message !== '') {
        $statement = $pdo->prepare(
            'UPDATE message SET first_name = :first_name, last_name = :last_name, subject = :subject, message = :message WHERE id = 4;'
        );
        $statement->bindValue('first_name', $firstName, PDO::PARAM_STR);
        $statement->bindValue('last_name', $lastName, PDO::PARAM_STR);
        $statement->bindValue('subject', $subject, PDO::PARAM_STR);
        $statement->bindValue('message', $message, PDO::PARAM_STR);
        $statement->execute();
    }
} catch (PDOException $exception) {
    var_dump($exception);
}