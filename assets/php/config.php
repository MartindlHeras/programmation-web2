<?php
session_start();

if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = 'fr';
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if ($_GET['lang'] == 'es')
        $_SESSION['lang'] = 'es';
    else if ($_GET['lang'] == 'en')
        $_SESSION['lang'] = 'en';
    else
        $_SESSION['lang'] = 'fr';
}
