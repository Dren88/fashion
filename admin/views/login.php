<?include "views/header.php";?>
<main class="page-authorization">
    <h1 class="h h--1">Авторизация</h1>
    <form class="custom-form" action="<?=PATH_ADMIN?>login" method="post">
        <input name="email" type="email" class="custom-form__input" required="">
        <input name="password" type="password" class="custom-form__input" required="">
<!--        <button class="button" type="submit">Войти в личный кабинет</button>-->
        <input name="log_in" class="button" type="submit" value="Войти в личный кабинет">
    </form>
    <?if (isset($_SESSION['auth']['errors'])):?>
    <h2><?=$_SESSION['auth']['errors'];?></h2>
    <?unset($_SESSION['auth']['errors']);?>
    <?endif;?>
</main>
<?include "views/footer.php";?>