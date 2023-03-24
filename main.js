jQuery(document).ready(function ($) {
  // let basic;
  // $('.add-photo').on('click', function () {
  //   $('#photo').trigger('click');
  //   return false;
  // });
  // start
  // let widthInput = $('#width');
  // let heightInput = $('#height');
  // let widthInputVal;
  // let heightInputVal;

  // widthInput.on('change', function () {
  //   widthInputVal = parseInt(this.value);
  // });
  // heightInput.on('change', function () {
  //   heightInputVal = parseInt(this.value);
  // });

  // $('.big_img').croppie({
  //   viewport: {
  //     width: widthInputVal,
  //     height: heightInputVal,
  //   },
  //   showZoomer: false,
  //   enableResize: true,
  //   enableOrientation: true,
  //   mouseWheelZoom: 'ctrl',
  // });

  // start

  // Получаем элементы HTML
  const bigImg = document.querySelector('.big_img');
  const heightInput = document.querySelector('#height');
  const widthInput = document.querySelector('#width');

  // Инициализируем объект Croppie
  const croppie = new Croppie(bigImg, {
    viewport: { width: 100, height: 200 },
    boundary: { width: 300, height: 300 },
    showZoomer: true,
  });

  // Обновляем viewport изображения при изменении значений полей ввода
  heightInput.addEventListener('input', updateViewport);
  widthInput.addEventListener('input', updateViewport);

  function updateViewport() {
    const height = parseInt(heightInput.value);
    const width = parseInt(widthInput.value);
    croppie.setViewport({ width, height });
  }

  // end

  // widthInput.addEventListener('change', function () {
  //   croppie.bind({
  //     viewport: {
  //       width: parseInt(this.value),
  //     },
  //   });
  // });
  // heightInput.addEventListener('change', function () {
  //   croppie.bind({
  //     viewport: {
  //       height: parseInt(this.value),
  //     },
  //   });
  // });
  // end
  // $('#photo').on('change', function () {
  //   let formData = new FormData();
  //   formData.append('file', $(this)[0].files[0]);
  //   $.ajaxSetup({
  //     headers: {
  //       //headers
  //     },
  //   });
  //   $.ajax({
  //     url: 'server.php',
  //     type: 'POST',
  //     data: formData,
  //     processData: false,
  //     contentType: false,
  //     dataType: 'json',
  //   }).done(function (html) {
  //     if (html.status == 'success') {
  //       //
  //       $('input[name="photo_c"]').val(html.file_max);
  //       $('.photo_i').attr('src', html.path_max);
  //       // Crop
  //       // basic = $('.photo_i').croppie({
  //       //   viewport: { width: 100, height: 200 },
  //       //   showZoomer: false,
  //       //   enableResize: true,
  //       //   enableOrientation: true,
  //       //   mouseWheelZoom: 'ctrl',
  //       // });
  //     }
  //   });
  // });

  //
});
