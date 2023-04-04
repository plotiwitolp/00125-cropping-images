$(document).ready(function () {
  $('body').on('click', '.flip-card-front img', function () {
    let productIdName = $(this).parents('.flip-card-inner').attr('id');

    let productId = productIdName.split('_')[1];

    console.log(productId);

    $.ajax({
      url: 'http://00125-cropping-images/00125-cropping-images-v3/wp-admin/admin-ajax.php',
      type: 'post',
      data: {
        action: 'get_product_gallery',
        product_id: productId, // ID товара, для которого нужно получить галерею
      },
      success: function (response) {
        $('.popup-gallery').html('');

        response.forEach(function (url) {
          console.log(url);

          $('.popup-gallery').append(`<img src="${url}">`);
        });

        $('.popup-gallery_wrap').addClass('popup-gallery_wrap_active');

        $('.popup-gallery').slick();
      },
    });
  });
});
