<?include "views/header.php";?>
    <main class="page-add">
        <h1 class="h h--1">Измененние товара</h1>
        <?php if(isset($_SESSION['res']['ok'])): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?=$_SESSION['res']['ok']?>
            </div>
        <?php elseif(isset($_SESSION['res']['error'])): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?=$_SESSION['res']['error']?>
            </div>
        <?php endif;
        unset($_SESSION['res']);
        ?>

<?unset($_SESSION['res']);?>
        <form class="custom-form" action="#" method="post" enctype="multipart/form-data">
            <fieldset class="page-add__group custom-form__group">
                <legend class="page-add__small-title custom-form__title">Данные о товаре</legend>
                <label for="product-name" class="custom-form__input-wrapper page-add__first-wrapper">
                    <p class="">Название товара</p>
                    <input type="text" class="custom-form__input" name="product-name" id="product-name" value="<?=$product['title']?>">
                </label>
                <label for="product-price" class="custom-form__input-wrapper">
                    <p class="">Цена товара</p>
                    <input type="text" class="custom-form__input" name="product-price" id="product-price" value=" <?=$product['price']?>">

                </label>
            </fieldset>
            <fieldset class="page-add__group custom-form__group">
                <legend class="page-add__small-title custom-form__title">Фотография товара</legend>
                <ul class="add-list">
                    <li class="add-list__item add-list__item--add">
                        <input type="file" name="product-photo" id="product-photo" hidden="" value="<?=$product['image']?>">
                        <label for="product-photo">Добавить фотографию</label>
                    </li>
                    <?if($product['image']):?>
                    <li class="add-list__item add-list__item--active"><img src="<? echo '/'. PRODUCTIMG . $product['image']?>"></li>
                    <?endif;?>

                </ul>
            </fieldset>
            <fieldset class="page-add__group custom-form__group">
                <legend class="page-add__small-title custom-form__title">Раздел</legend>
                <div class="page-add__select">
                    <? if (!empty($categories)): ?>
                        <select name="category" class="custom-form__select" multiple="multiple">
                            <option hidden="">Название раздела</option>
                            <? foreach ($categories as $category): ?>
                                <option <? if ($category['id'] == $product['parent']) echo 'SELECTED' ?>
                                    value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                            <? endforeach; ?>
                        </select>
                    <? endif; ?>
                </div>
                <input type="checkbox" <? if ($product['new'] == 'Y') echo 'CHECKED' ?> name="new" id="new" class="custom-form__checkbox">
                <label for="new" class="custom-form__checkbox-label">Новинка</label>
                <input type="checkbox" <? if ($product['sale'] == 'Y') echo 'CHECKED' ?> name="sale" id="sale" class="custom-form__checkbox">
                <label for="sale" class="custom-form__checkbox-label">Распродажа</label>
            </fieldset>
<!--            <button class="button" type="submit">Изменить товар</button>-->
            <input type="submit" name = "edit-product" class="button" value="Изменить товар">
        </form>
<!--        <section class="shop-page__popup-end page-add__popup-end" hidden="">-->
<!--            <div class="shop-page__wrapper shop-page__wrapper--popup-end">-->
<!--                <h2 class="h h--1 h--icon shop-page__end-title">Товар успешно добавлен</h2>-->
<!--            </div>-->
<!--        </section>-->
    </main>
<script>
    $('.add-list__item--active').click(function () {
        $(this).remove();
        $('.add-list__item--add').removeAttr('hidden');

    })
</script>
<?include "views/footer.php";?>