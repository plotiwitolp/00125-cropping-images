<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="./server.php">
        <h1>server</h1>
    </a>
    <div class="container">
        <div id="mount" class="mount"></div><!--
      -->
        <div class="info">
            <div class="field-pair">
                <div class="field">
                    <input type="text" id="input-x" value="0" />
                    <label for="input-x">X</label>
                </div>
                <div class="field">
                    <input type="text" id="input-y" value="0" />
                    <label for="input-x">Y</label>
                </div>
            </div>
            <!-- -->
            <div class="field-pair">
                <div class="field">
                    <input type="text" id="input-width" value="0" />
                    <label for="input-x">Width</label>
                </div>
                <div class="field">
                    <input type="text" id="input-height" value="0" />
                    <label for="input-x">Height</label>
                </div>
            </div>
            <button id="save-button">Сохранить</button>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/tinycrop@1.7.0/dist/tinycrop.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <script src="./main.js"></script>
</body>

</html>