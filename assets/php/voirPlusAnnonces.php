<?php
$id = htmlspecialchars($_GET['id']);

try {
    $pdo = new PDO('sqlite:../../database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($id > 0) {

        $statement = $pdo->prepare(
            "SELECT * FROM annonces WHERE id = ?"
        );
        $statement->execute(array($id));
        $annonces = $statement->fetchAll();
    }
} catch (PDOException $exception) {
    var_dump($exception);
}

foreach ($annonces as $annonce) :
    ?>
    <li class="annonce">
        <a href="information.php?id=<?= $annonce['id']; ?>">
            <h2><?= $annonce['titre']; ?></h2>
            <p><?= $annonce['description']; ?>
            <p class="type">
                <?php if ($annonce['type'] == 'etudes') :?>
                    Études
                <?php elseif ($annonce['type'] == 'evenement') :?>
                    Événement
                <?php else :?>
                    Logement
                <?php endif; ?>
            </p>
        </a>
    </li>
<?php endforeach; ?>
