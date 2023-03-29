<?php
/*
Template Name: Custom Product Template
*/

defined('ABSPATH') || exit;

$product_id = $_GET['id'];
$product = new WC_product($product_id);

get_header();
?>


<h1><?php echo $product->get_name(); ?> нестандартный размер</h1>
<?php

$product = wc_get_product($product_id); // получаем объект товара по ID
$attachment_ids = $product->get_gallery_image_ids(); // получаем массив ID изображений галереи товара

$image_id = $product->get_image_id(); // получаем ID основного изображения товара
?>

<div style="display:none;">
    <?php
    if ($image_id) {
        echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'img_class'));
    }
    ?>
</div>
<div class="container">
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
        <button id="save-button">Сохранить обрезанное изображение</button>
        <?php
        if ($product->is_in_stock()) {
            woocommerce_template_single_add_to_cart();
        }
        ?>

        <input type="hidden" name="custom_data" value="" id="custom-data-input">
        <div id="price_calculator"></div>


        <h3 style="display:none;"> Это то, что сохраняется на сервере:</h3>
        <div class="crop-img" style="display:none;"></div>
        <h3> Ссылка с уникальным именем обрезанной картинки (то, что и должно передаваться вместе с остальными данными о товаре при его отправки):</h3>
        <div class="crop-data">пусто</div>

        <script>

        </script>
    </div>
</div>



<?php
get_footer();
