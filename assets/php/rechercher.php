<?php include 'config.php';
require_once '../../langages/' . $_SESSION['lang'] . '.php';?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>EES</title>
    <meta name="description" content="Résultats du recherche">
    <meta name="keywords" content="HTML,CSS,JavaScript, PHP">
    <meta name="author" content="Martin de las Heras">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php include '../../templates/navbar.php'; ?>

<section>
    <h1><?php echo $lang['resultatsRecherche'] ?></h1>

    <ul>
        <?php
        $titre = htmlspecialchars($_POST['text']);
        $type = htmlspecialchars($_POST['type']);

        $pdo = new PDO('sqlite:../../database.db');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($titre && $type) {
            $statement = $pdo->prepare(
                "SELECT * FROM annonces WHERE type = ? AND titre LIKE ?"
            );
            $statement->execute(array($type, '%'.$titre.'%'));
            $annonces = $statement->fetchAll();
        }
        else {
            $statement = $pdo->prepare(
                "SELECT * FROM annonces WHERE type = ?"
            );
            $statement->execute(array($type));
            $annonces = $statement->fetchAll();
        }

        foreach ($annonces as $annonce) :
            ?>
            <li class="annonce">
                <a href="information.php?id=<?= $annonce['id']; ?>">
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
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php include '../../templates/footer.php'; ?>
<script type="text/javascript" src="../js/scriptInfo.js"></script>

</body>
</html>
