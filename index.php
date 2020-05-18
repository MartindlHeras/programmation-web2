<?php include 'assets/php/config.php';
require_once 'langages/' . $_SESSION['lang'] . '.php';?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>EES</title>
    <meta name="description" content="Étudiants Étrangers du Strasbourg">
    <meta name="keywords" content="HTML,CSS,JavaScript, PHP">
    <meta name="author" content="Martin de las Heras">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php include 'templates/navbar.php'; ?>

<section>
    <h1><?php echo $lang['titre'] ?></h1>

    <form action="assets/php/rechercher.php" method="post">
        <div>
            <label for="text"><?php echo $lang['labelRechercher'] ?></label>
            <input type="text" name="text"/>

            <select name="type">
                  <option value="etudes"><?php echo $lang['etudes'] ?></option>
                  <option value="evenement"><?php echo $lang['evenement'] ?></option>
                <option value="logement"><?php echo $lang['logement'] ?></option>
            </select>
        </div>
        <button type="submit"><?php echo $lang['commencer'] ?></button>
    </form>

    <ul>
        <?php
        $pdo = new PDO('sqlite:database.db');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $annonces = $pdo->query(
            'SELECT * FROM annonces ORDER BY id DESC LIMIT 8'
        )->fetchAll();

        foreach ($annonces as $annonce) :
            ?>
            <li class="annonce">
                <a href="assets/php/information.php?id=<?= $annonce['id']; ?>">
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
    <button id="voirPlus" ><?php echo $lang['voirPlus'] ?></button>
</section>
<?php include 'templates/footer.php'; ?>
<script type="text/javascript" src="assets/js/scriptIndex.js"></script>

</body>
</html>
