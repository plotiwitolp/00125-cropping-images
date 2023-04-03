<?php

defined('ABSPATH') || exit;

get_header();

do_action('woocommerce_before_main_content');


$product_id = get_the_ID();
$product = get_post($product_id);


echo '<pre>';
// var_dump($product);
echo '</pre>';
?>



<?php
while (have_posts()) :
    the_post();
    // do_action('woocommerce_before_single_product');
?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

        <?php
        do_action('woocommerce_before_single_product_summary');
        ?>
        test-2
        <?php

        $product_permalink = get_permalink($product_id) . 'custom-product-template/?id=' . $product_id;
        ?>
        <a href="<?php echo esc_url($product_permalink); ?>" class="button custom-product-button">Изготовить обои на заказ? Кликните сюда!</a>


        <div class="summary entry-summary">
            <?php
            do_action('woocommerce_single_product_summary');
            ?>
        </div>
        <?php
        do_action('woocommerce_after_single_product_summary');
        ?>
    </div>
<?php
    do_action('woocommerce_after_single_product');
endwhile; // end of the loop.


do_action('woocommerce_after_main_content');

get_footer();
?>