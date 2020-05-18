<?php include 'formCommenter.php';
include 'config.php';
require_once '../../langages/' . $_SESSION['lang'] . '.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EES</title>
    <meta name="description" content="Information sur l'annoce choisit">
    <meta name="keywords" content="HTML,CSS,JavaScript, PHP">
    <meta name="author" content="Martin de las Heras">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php include '../../templates/navbar.php'; ?>

<section>
    <?php
    $id = htmlspecialchars($_GET['id']);

    $pdo = new PDO('sqlite:../../database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare(
        "SELECT * FROM annonces WHERE id = ?"
    );
    $statement->execute(array($id));
    $annonces = $statement->fetchAll();

    foreach ($annonces as $annonce) :
        ?>
        <li class="annonce information">
            <h2><?= $annonce['titre']; ?></h2>
            <p><?= $annonce['description']; ?>
            <p class="type">
                <?php if ($annonce['type'] == 'etudes') :?>
                    <?php echo $lang['etudes'] ?>
                <?php elseif ($annonce['type'] == 'evenement') :?>
                    <?php echo $lang['evenement'] ?>
                <?php else :?>
                    <?php echo $lang['logement'] ?>
                <?php endif; ?>
            </p>
        </li>
        <li class="annonce information">
            <h3><?php echo $lang['informationContactCreer'] ?></h3>
            <p><?= $annonce['first_name']; ?> <?= $annonce['last_name']; ?>
            <p><?= $annonce['mail']; ?>
        </li>
    <?php endforeach; ?>

    <form id="commenter_form" method="post">

        <label for="firstName"><?php echo $lang['prenom'] ?></label><br/>
        <input id="firstName" type="text" name="firstName" required aria-required="true" aria-labelledby="firstName"/>
        <label for="lastName"><?php echo $lang['nom'] ?></label><br/>
        <input id="lastName" type="text" name="lastName" required aria-required="true" aria-labelledby="lastName"/>

        <label for="commentaire"><?php echo $lang['commentaire'] ?></label><br/>
        <input id="commentaire"type="text" name="commentaire" required aria-required="true" aria-labelledby="commentaire"/>

        <button type="submit"><?php echo $lang['commenter'] ?></button>
    </form>

    <ul class="commentaires">
        <?php
        if ($id) {
            $statement = $pdo->prepare(
                "SELECT * FROM commentaires WHERE id_annonce = ? ORDER BY id DESC LIMIT 4"
            );
            $statement->execute(array($id));
            $commentaires = $statement->fetchAll();
        }

        foreach ($commentaires as $commentaire) :
            ?>
            <li>
                <p style="display: none;"><?= $commentaire['id']; ?>&<?= $commentaire['id_annonce']; ?>
                <p class="nom"><?= $commentaire['first_name']; ?> <?= $commentaire['last_name']; ?>
                <p class="commentaire"><?= $commentaire['commentaire']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <button id="voirPlus" ><?php echo $lang['voirPlus'] ?></button>
</section>
<?php include '../../templates/footer.php'; ?>
<script type="text/javascript" src="../js/scriptCommenter.js"></script>

</body>
</html>
