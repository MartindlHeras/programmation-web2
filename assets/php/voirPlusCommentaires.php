<?php
$idAnnonce = htmlspecialchars($_GET['idAnnonce']);
$idCommentaire = htmlspecialchars($_GET['idCommentaire']);

try {
    $pdo = new PDO('sqlite:../../database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($idCommentaire > 0 && $idAnnonce > 0) {

        $statement = $pdo->prepare(
            "SELECT * FROM commentaires WHERE id < ? AND id_annonce = ?"
        );
        $statement->execute(array($idCommentaire, $idAnnonce));
        $commentaires = $statement->fetchAll();
    }
} catch (PDOException $exception) {
    var_dump($exception);
}

foreach ($commentaires as $commentaire) :
    ?>
    <li>
        <p style="display: none;"><?= $commentaire['id']; ?><?= $commentaire['id_annonce']; ?>
        <p class="nom"><?= $commentaire['first_name']; ?> <?= $commentaire['last_name']; ?>
        <p class="commentaire"><?= $commentaire['commentaire']; ?>
    </li>
<?php endforeach; ?>
