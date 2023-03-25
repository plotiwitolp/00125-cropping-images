jQuery(document).ready(function ($) {
  // START

  let classImg = $('.img_class').attr('src');

  var crop = tinycrop.create({
    parent: '#mount',
    image: classImg,
    bounds: {
      width: '100%',
      height: '100%',
    },
    backgroundColors: ['#353535'],
    selection: {
      color: '#353535',
      activeColor: '#353535',
      minWidth: 50,
      minHeight: 50,
      width: 100,
      height: 200,
    },
  });

  function getId(id) {
    return document.getElementById(id);
  }

  var inputX = getId('input-x');
  var inputY = getId('input-y');
  var inputWidth = getId('input-width');
  var inputHeight = getId('input-height');

  function setInputsFromRegion(region) {
    inputX.value = region.x;
    inputY.value = region.y;
    inputWidth.value = region.width;
    inputHeight.value = region.height;
  }

  function minMaxValues(min, max) {
    if (parseInt(inputWidth.value) < min) {
      inputWidth.value = min;
    }
    if (parseInt(inputHeight.value) < min) {
      inputHeight.value = min;
    }
    if (parseInt(inputWidth.value) > max) {
      inputWidth.value = max;
    }
    if (parseInt(inputHeight.value) > max) {
      inputHeight.value = max;
    }
  }

  $(inputWidth).on('change', function () {
    minMaxValues(50, 400);
    crop.selectionLayer.selection.region.width = parseInt(inputWidth.value);
    crop.revalidateAndPaint();
  });
  $(inputHeight).on('change', function () {
    minMaxValues(50, 400);
    crop.selectionLayer.selection.region.height = parseInt(inputHeight.value);
    crop.revalidateAndPaint();
  });

  //
  crop
    .on('start', function (region) {
      setInputsFromRegion(region);
    })
    .on('move', function (region) {
      setInputsFromRegion(region);
    })
    .on('resize', function (region) {
      setInputsFromRegion(region);
    })
    .on('change', function (region) {
      setInputsFromRegion(region);
    })
    .on('end', function (region) {
      setInputsFromRegion(region);
    });

  function sendDataCropImage() {
    let srcImage = crop.image.src;
    let cropX = crop.selectionLayer.selection.region.x;
    let cropY = crop.selectionLayer.selection.region.y;
    let cropWidth = crop.selectionLayer.selection.region.width;
    let cropHeight = crop.selectionLayer.selection.region.height;

    $.ajax({
      url: 'http://00125-cropping-images/00125-cropping-images-v3/wp-content/themes/cropimg/server.php',
      method: 'POST',
      data: {
        x: cropX,
        y: cropY,
        width: cropWidth,
        height: cropHeight,
        src: srcImage,
      },
      success: function (response) {
        console.log(response);
        $('.crop-img').html(`<img src="http://00125-cropping-images/00125-cropping-images-v3/wp-content/themes/cropimg/${response.crop_scr}">`);
        $('.crop-data').html(`
        <p>${response.crop_scr}</p>
        `);
      },
      error: function (error) {
        console.error(error.responseText);
      },
    });
  }

  var saveButton = getId('save-button');
  saveButton.addEventListener('click', function () {
    sendDataCropImage();
  });

  // END
});
