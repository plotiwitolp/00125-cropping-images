<?php get_header(); ?>
<?php the_content() ?>
<div class="container">
    <h1>ГЛАВНАЯ</h1>
    <img style="display:none;" class="img_class" src="<?php echo get_template_directory_uri(); ?>/img/Productfoto1-2-510x340.png">
    <div id="mount" class="mount">
    </div>
    <!-- -->
    <div class="info">
        <div class="field-pair">
            <div class="field" style="display:none;">
                <input type="number" id="input-x" value="0" />
                <label for="input-x">X</label>
            </div>
            <div class="field" style="display:none;">
                <input type="number" id="input-y" value="0" />
                <label for="input-x">Y</label>
            </div>
        </div>
        <!-- -->
        <div class="field-pair">
            <div class="field">
                <input type="number" id="input-width" value="0" step="10" />
                <label for="input-x">Width</label>
            </div>
            <div class="field">
                <input type="number" id="input-height" value="0" step="10" />
                <label for="input-x">Height</label>
            </div>
        </div>
        <button id="save-button">Добавить в корзину</button>

        <h3> Это то, что сохраняется на сервере:</h3>
        <div class="crop-img"></div>
        <h3> Ссылка с уникальным именем обрезанной картинки (то, что и должно передаваться вместе с остальными данными о товаре при его отправки):</h3>
        <div class="crop-data"></div>
    </div>
</div>



<?php get_footer(); ?>