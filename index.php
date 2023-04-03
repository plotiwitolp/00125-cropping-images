<?php get_header(); ?>
<?php the_content() ?>
<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);

$products = new WP_Query($args);


?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/popup-gallery.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

<div class="div-wrapper">
    <?php
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
    ?>
            <?php
            $product_id = get_the_ID();
            // Получаем объект товара по ID
            $productNew = wc_get_product($product_id);

            $image_id = $productNew->get_image_id();

            // Получаем URL изображения товара
            $image = wp_get_attachment_image_src($image_id, 'full');

            // Выводим изображение товара
            echo '
<div class="flip-card-inner" id="element_' . $product_id . '">
<div class="flip-card-front">
<img src="' . esc_url($image[0]) . '" alt="' . esc_attr($productNew->get_name()) . '"/>
</div>'
            ?>
            <a href="<?php the_permalink()  ?>"><?php the_title() ?></a>
</div>

<?php
        }
        wp_reset_postdata();
    } else {
        echo __('No products found');
    }
?>
</div>


<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/popup-gallery.js"></script>

<div class="popup-gallery_wrap">
    <div class="popup-gallery"></div>
</div>
<div class="popup-gallery_back"></div>