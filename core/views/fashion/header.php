<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Fashion</title>

    <meta name="description" content="Fashion - интернет-магазин">
    <meta name="keywords" content="Fashion, интернет-магазин, одежда, аксессуары">

    <meta name="theme-color" content="#393939">

    <link rel="preload" href="/<?=VIEW?>img/intro/coats-2018.jpg" as="image">
    <link rel="preload" href="/<?=VIEW?>fonts/opensans-400-normal.woff2" as="font">
    <link rel="preload" href="/<?=VIEW?>fonts/roboto-400-normal.woff2" as="font">
    <link rel="preload" href="/<?=VIEW?>fonts/roboto-700-normal.woff2" as="font">
    <link rel="icon" href="/<?=VIEW?>img/favicon.png">
    <link rel="stylesheet" href="/<?=VIEW?>css/style.min.css">
    <link rel="stylesheet" href="/<?=VIEW?>css/new.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src= "/<?=VIEW?>js/scripts.js" defer=""></script>
    <script src="/<?=VIEW?>js/new_scripts.js"></script>
</head>
<body>
<?
$dir = '';
if (preg_match('#^/.*/#', $_SERVER['REQUEST_URI'], $matches)) $dir = $matches;
$dir = $dir ? $dir : '/';
?>
<header class="page-header">
    <a class="page-header__logo" href="/">
        <img src="/<?= VIEW ?>img/logo.svg" alt="Fashion">
    </a>
    <? include $_SERVER['DOCUMENT_ROOT'].'/'.'main_menu.php'; ?>
    <? if (isset($menu) && is_array($menu)): ?>
        <nav class="page-header__menu">
            <ul class="main-menu main-menu--header">
                <? foreach ($menu as $item): ?>
                    <li>
                        <a class="main-menu__item <?if ($item['link'] == $_SERVER['REQUEST_URI'] || $dir == $item['link']) echo 'active'?>" href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                    </li>
                <? endforeach; ?>
            </ul>
        </nav>
    <? endif; ?>

</header>
<main class="shop-page">