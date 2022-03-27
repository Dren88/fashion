</main>
<footer class="page-footer">
    <div class="container">
        <a class="page-footer__logo" href="/">
            <img src="/<?=VIEW?>img/logo--footer.svg" alt="Fashion">
        </a>
        <? include $_SERVER['DOCUMENT_ROOT'].'/'.'main_menu.php'; ?>
        <? if (isset($menu) && is_array($menu)): ?>
        <nav class="page-footer__menu">
            <ul class="main-menu main-menu--footer">
                <? foreach ($menu as $item): ?>
                <li>
                    <a class="main-menu__item" href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                </li>
                <? endforeach; ?>
            </ul>
        </nav>
        <? endif; ?>
        <address class="page-footer__copyright">
            © Все права защищены
        </address>
    </div>
</footer>
<script>
    var path = "<?=PATH?>";
</script>
</body>
</html>
