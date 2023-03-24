jQuery(document).ready(function ($) {
  // START

  var crop = tinycrop.create({
    parent: '#mount',
    image: './img/Productfoto1-2-510x340.png',
    bounds: {
      width: '100%',
      height: '50%',
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

  $(inputWidth).on('blur', function () {
    crop.selectionLayer.selection.region.width = parseInt(inputWidth.value);
    crop.revalidateAndPaint();
  });
  $(inputHeight).on('blur', function () {
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
    //
    // console.log('cropX: ' + cropX, 'cropY ' + cropY, 'cropWidth ' + cropWidth, 'cropHeight ' + cropHeight, 'srcImage ' + srcImage);
    //
    $.ajax({
      url: 'server.php',
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
      },
      error: function (error) {
        console.error(error.responseText);
      },
    });
  }

  // sendDataCropImage();

  var saveButton = getId('save-button');
  saveButton.addEventListener('click', function () {
    sendDataCropImage();
  });

  // END
});
