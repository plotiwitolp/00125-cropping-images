<?php
$uploaddir = 'upload/';

if (isset($_POST['photo'])) {
    //
} else {
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    $arr = array();
    // crop
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        $arr['status'] = 'success';
        $arr['path_max'] = 'http://00125-cropping-images/00125-cropping-images-v1/' . $uploadfile;
        $arr['file_max'] = $_FILES['file']['name'];
    } else {
        $arr['status'] = 'fail';
    }
}

function str_random($length)
{
    return substr(md5(microtime()), 0, $length);
}

header('Content-type: application/json');
echo json_encode($arr);
exit();
