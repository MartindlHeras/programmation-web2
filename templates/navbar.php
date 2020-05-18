<link rel="stylesheet" type="text/css" href="/programmation-web-2-s4-2020/assets/css/style.css"/>

<?php $id = '';
if ($_GET['id'])
    $id = "&id=" . $_GET['id'];?>

<div class="header">
    <a href="/programmation-web-2-s4-2020/index.php"><h1>EES</h1></a>

    <ul>
        <li class="icon">
            <a href=<?php echo "?lang=fr" . $id;?>>
                <img src="/programmation-web-2-s4-2020/assets/img/france.png" alt="drapeau france" height="30" width="30">
            </a>
        </li>
        <li class="icon">
            <a href=<?php echo "?lang=es" . $id;?>>
                <img src="/programmation-web-2-s4-2020/assets/img/spain.png" alt="drapeau espagne" height="30" width="30">
            </a>
        </li>
        <li class="icon">
            <a href=<?php echo "?lang=en" . $id;?>>
                <img src="/programmation-web-2-s4-2020/assets/img/united-kingdom.png" alt="drapeau uk" height="30" width="30">
            </a>
        </li>
    </ul>
</div>

<nav>
    <ul>
        <li><a href="/programmation-web-2-s4-2020/index.php"><?php echo $lang['principal'] ?></a></li>
        <li><a href="/programmation-web-2-s4-2020/assets/php/creer.php"><?php echo $lang['creation'] ?></a></li>
    </ul>
</nav>
