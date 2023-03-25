<?php
/*
Template Name: Custom Product Template
*/
get_header(); ?>

<?php
$custom_url = $_SERVER["REQUEST_URI"];
$custom_url_parts = explode("-", $custom_url);
$product_slug = $custom_url_parts[0];
$product = get_page_by_path($product_slug, OBJECT, 'product');
?>

<h1><?php echo $product->get_name(); ?></h1>
<p><?php echo $product->get_price_html(); ?></p>
<?php echo $product->get_image() ?>


<!-- Your custom HTML code here -->

<?php get_footer(); ?>