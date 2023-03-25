<?php get_header(); ?>
<?php the_content() ?>
<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);

$products = new WP_Query($args);

if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();
?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php
    }
    wp_reset_postdata();
} else {
    echo __('No products found');
}
?>



<?php get_footer(); ?>