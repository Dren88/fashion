<?include "views/header.php";?>
    <main class="page-products">
        <h1 class="h h--1">Товары</h1>
        <a class="page-products__button button" href="<?=PATH_ADMIN . 'add/'?>">Добавить товар</a>
        <div class="page-products__header">
            <span class="page-products__header-field">Название товара</span>
            <span class="page-products__header-field">ID</span>
            <span class="page-products__header-field">Цена</span>
            <span class="page-products__header-field">Категория</span>
            <span class="page-products__header-field">Новинка</span>
        </div>
        <ul class="page-products__list" data-table="delete">
            <?foreach ($products as $product):?>
            <li class="product-item page-products__item">
                <b class="product-item__name"><?=$product['title']?></b>
                <span class="product-item__field"><?=$product['id']?></span>
                <span class="product-item__field"><?=$product['price']?> руб.</span>
                <span class="product-item__field"><?=$product['category_title']?></span>
                <span class="product-item__field"><?echo $product['new'] ? 'Да' : ''?></span>
                <a href="product/<?=$product['id']?>/edit" class="product-item__edit" aria-label="Редактировать"></a>
<!--                <a href="product/--><?//=$product['id']?><!--/delete" class="product-item__delete"></a>-->
                <img class="product-item__delete" data-id="<?=$product['id']?>" alt="">
                <!--                <button class="product-item__delete"></button>-->
            </li>
            <?endforeach;?>
        </ul>

        <?if($count_pages > 1):?>
            <ul class="shop__paginator paginator">
                <?echo $pagination?>
            </ul>
        <?endif;?>

    </main>
<?include "views/footer.php";?>