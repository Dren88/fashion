<? if (count($products) > 0): ?>
    <section class="shop__list">
        <? foreach ($products as $product): ?>
            <article class="shop__item product" tabindex="0">
                <div class="product__image">
                    <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
                </div>
                <p class="product__name"><?= $product['title'] ?></p>
                <span class="product__price"><?= $product['price'] ?> руб.</span>
            </article>
        <? endforeach; ?>
    </section>
<? endif; ?>
<ul class="shop__paginator paginator">
    <li>
        <a class="paginator__item">1</a>
    </li>
    <li>
        <a class="paginator__item" href="">2</a>
    </li>
</ul>