<?php

    ini_set('display_errors', 7);
    ini_set('display_startup_errors', 7);
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

    require_once __DIR__ . '/config/Config.php';

    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/config/Connect.php';
    require_once __DIR__ . '/controller/Shortener.php';
    require_once __DIR__ . '/model/DescShort.php';
    require_once __DIR__ . '/service/DescShortService.php';

    $smarty = new Smarty();
    $smarty->setTemplateDir(__DIR__ . '/view/template');
    $smarty->setCompileDir(__DIR__ . '/view/template_c');

    $connect = new Connect();

    $shortener = new Shortener($smarty, $connect);

    if (isset($_GET['d'])) {
        $request = $_GET['d'];

        if (empty($request)) {
            if (!isset($_POST['shorter_new'])) {
                $shortener->page();
            }
        } else {
            $shortener->redirectWebCode($request);
        }
    } 

    if (isset($_POST['shorter_new'])) {
        $shortener->save();
    }

    exit();