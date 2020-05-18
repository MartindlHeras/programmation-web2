<?php include 'formCreer.php';
include 'config.php';
require_once '../../langages/' . $_SESSION['lang'] . '.php';?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>EES</title>
    <meta name="description" content="Page de création d'un annonce">
    <meta name="keywords" content="HTML,CSS,JavaScript, PHP">
    <meta name="author" content="Martin de las Heras">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php include '../../templates/navbar.php'; ?>

<section>
    <h1><?php echo $lang['titreCreer'] ?></h1>

    <form id="creation_annonce" method="post">

        <h3><?php echo $lang['informationCreer'] ?></h3>
        <label for="titre"><?php echo $lang['labelTitre'] ?></label><br/>
        <input id="titre" type="text" name="titre" required aria-required="true" aria-labelledby="titre"/>

        <select name="type" id="type" required aria-required="true">
            <option value="etudes"><?php echo $lang['etudes'] ?></option>
            <option value="evenement"><?php echo $lang['evenement'] ?></option>
            <option value="logement"><?php echo $lang['logement'] ?></option>
        </select>

        <label for="description"><?php echo $lang['descriptionCreer'] ?></label><br/>
        <input id="description" type="text" name="description" required aria-required="true" aria-labelledby="description"/>

        <h3><?php echo $lang['informationContactCreer'] ?></h3>
        <label for="firstName"><?php echo $lang['prenom'] ?></label><br/>
        <input id="firstName" type="text" name="firstName" required aria-required="true" aria-labelledby="firstName"/>
        <label for="lastName"><?php echo $lang['nom'] ?></label><br/>
        <input id="lastName" type="text" name="lastName" required aria-required="true" aria-labelledby="lastName"/>
        <label for="mail"><?php echo $lang['mail'] ?></label><br/>
        <input id="mail" type="text" name="mail" required aria-required="true" aria-labelledby="mail"/>

        <button type="submit"><?php echo $lang['creer'] ?></button>
    </form>
</section>

<?php include '../../templates/footer.php'; ?>
<script type="text/javascript" src="../js/scriptCreer.js"></script>

</body>
</html>
