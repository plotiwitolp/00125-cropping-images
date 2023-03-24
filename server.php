<?php
if (isset($_POST['src'])) {
    // Получить параметры изображения
    $src_source = $arr['src'] = $_POST['src'];
    $src = null;
    $ext = strtolower(pathinfo($src_source, PATHINFO_EXTENSION));
    if ($ext === 'jpg' || $ext === 'jpeg') {
        $src = imagecreatefromjpeg($src_source);
    } else if ($ext === 'png') {
        $src = imagecreatefrompng($src_source);
    }

    if ($src === false) {
        $arr['status'] = 'error';
        $arr['message'] = 'Failed to create image resource.';
        header('Content-type: application/json');
        echo json_encode($arr);
        exit();
    }

    $source_x = $arr['x'] = $_POST['x'];
    $source_y = $arr['y'] = $_POST['y'];
    $height = $arr['height'] = $_POST['height'];
    $width = $arr['width'] = $_POST['width'];

    // Создать новое изображение для копирования и обрезки
    $new_image = imagecreatetruecolor($width, $height);

    // Копировать и обрезать изображение
    imagecopyresampled($new_image, $src, 0, 0, $source_x, $source_y, $width, $height, $width, $height);

    // Сохранить новое изображение
    function str_random($length)
    {
        return substr(md5(microtime()), 0, $length);
    }

    $crop_name = "crop_img_" . str_random(6) . "." . $ext;

    $arr['crop_name'] = $crop_name;

    if (!file_exists('upload')) {
        mkdir('upload');
    }

    $save_result = false;
    if ($ext === 'jpg' || $ext === 'jpeg') {
        $save_result = imagejpeg($new_image, "upload/" . $crop_name, 90);
    } else if ($ext === 'png') {
        $save_result = imagepng($new_image, "upload/" . $crop_name);
    }

    if ($save_result === false) {
        $arr['status'] = 'error';
        $arr['message'] = 'Failed to save the cropped image.';
    }
} else {
    $arr['status'] = 'fail';
    $arr['message'] = 'Missing required parameters.';
}

header('Content-type: application/json');
echo json_encode($arr);
exit();
?>



<?php
// if (isset($_POST['src'], $_POST['x'], $_POST['y'], $_POST['height'], $_POST['width'])) {
//     // Получить параметры изображения
//     $src_source = $_POST['src'];
//     $src = imagecreatefrompng($src_source);
//     $source_x = $_POST['x'];
//     $source_y = $_POST['y'];
//     $height = $_POST['height'];
//     $width = $_POST['width'];

//     // Создать новое изображение для копирования и обрезки
//     $new_image = imagecreatetruecolor($width, $height);

//     // Копировать и обрезать изображение
//     imagecopyresampled($new_image, $src, 0, 0, $source_x, $source_y, $width, $height, $width, $height);

//     // Сохранить новое изображение
//     function str_random($length)
//     {
//         return substr(md5(microtime()), 0, $length);
//     }

//     $crop_name = "crop_img_" . str_random(6) . ".png";

//     if (!file_exists("upload") || !is_writable("upload")) {
//         $arr['status'] = 'error';
//         $arr['message'] = 'The "upload" directory is not accessible for writing.';
//     } else if (imagepng($new_image, "upload/" . $crop_name)) {
//         $arr['status'] = 'success';
//         $arr['crop_name'] = $crop_name;
//     } else {
//         $arr['status'] = 'error';
//         $arr['message'] = 'Failed to save the cropped image.';
//     }
// } else {
//     $arr['status'] = 'fail';
//     $arr['message'] = 'Missing required parameters.';
// }

// header('Content-type: application/json');
// echo json_encode($arr);
// exit();
?>




<?php
// if (isset($_POST['src'])) {
//     // Получить параметры изображения
//     $src_source = $arr['src'] = $_POST['src'];
//     $src = imagecreatefrompng($src_source);
//     $source_x = $arr['x'] = $_POST['x'];
//     $source_y = $arr['y'] = $_POST['y'];
//     $height = $arr['height'] = $_POST['height'];
//     $width = $arr['width'] = $_POST['width'];

//     // Создать новое изображение для копирования и обрезки
//     $new_image = imagecreatetruecolor($width, $height);

//     // Копировать и обрезать изображение
//     imagecopyresampled($new_image, $src, 0, 0, $source_x, $source_y, $width, $height, $width, $height);

//     // Сохранить новое изображение
//     function str_random($length)
//     {
//         return substr(md5(microtime()), 0, $length);
//     }

//     $crop_name = "crop_img_" . str_random(6) . ".png";

//     $arr['crop_name'] =  $crop_name;

//     imagepng($new_image, "upload/" . $crop_name);
// } else {
//     $arr['status'] = 'fail';
// }

// header('Content-type: application/json');
// echo json_encode($arr);
// exit();
?>
<?php
// $uploaddir = 'upload/';

// if (isset($_POST['photo'])) {
//     //
// } else {
//     $uploadfile = $uploaddir . basename($_FILES['file']['name']);
//     $arr = array();
//     // crop
//     if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
//         $arr['status'] = 'success';
//         $arr['path_max'] = 'http://00125-cropping-images/00125-cropping-images-v2/' . $uploadfile;
//         $arr['file_max'] = $_FILES['file']['name'];
//     } else {
//         $arr['status'] = 'fail 2';
//     }
// }

// function str_random($length)
// {
//     return substr(md5(microtime()), 0, $length);
// }

// header('Content-type: application/json');
// echo json_encode($arr);
// exit();
