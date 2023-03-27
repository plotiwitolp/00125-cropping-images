<?php

function add_custom_data_field()
{
    echo '<input type="hidden" name="custom_data" value="" id="custom-data-input">';
}
add_action('woocommerce_before_add_to_cart_button', 'add_custom_data_field');


// Добавляем данные в корзину товара
add_filter('woocommerce_add_cart_item_data', 'my_custom_data', 10, 2);
function my_custom_data($cart_item_data, $product_id)
{
    // if (isset($_POST['custom_data'])) {
    $cart_item_data['custom_data'] = sanitize_text_field($_POST['custom_data']);
    // }
    return $cart_item_data;
}

// Отображение данных в корзине товара
add_filter('woocommerce_get_item_data', 'my_custom_data_display', 10, 2);
function my_custom_data_display($item_data, $cart_item)
{
    if (isset($cart_item['custom_data'])) {
        $item_data[] = array(
            'name' => 'Ссылка на образец',
            'value' => $cart_item['custom_data'],
        );
    }
    return $item_data;
}

// Сохраняем данные в заказе
add_action('woocommerce_add_order_item_meta', 'my_custom_data_order_meta', 10, 3);
function my_custom_data_order_meta($item_id, $cart_item, $cart_item_key)
{
    if (isset($cart_item['custom_data'])) {
        wc_add_order_item_meta($item_id, 'Ссылка на образец', $cart_item['custom_data']);
    }
}
