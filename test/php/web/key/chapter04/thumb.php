<?php

function thumb($image, $path, $width = 100, $height = 100){
    $src = imagecreatefromjpeg($image);               // 原图资源
    $dst = imagecreatetruecolor($width, $height);   // 创建缩略图画布
    $bg_color = imagecolorallocate($dst, 255, 255, 255);
    imagefill($dst, 0, 0, $bg_color);

    $src_info = getimagesize($image);
    $src_c = $src_info[0] / $src_info[1];
    $thu_c = $width / $height;
    if($src_c > $thu_c){
        $thu_w = $width;
        $thu_h = ceil($thu_w / $src_c);
    }else{
        $thu_h = $height;
        $thu_w = ceil($thu_h * $src_c);
    }

    $thu_x = ceil(abs($thu_w - $width) / 2);
    $thu_y = ceil(abs($thu_h - $height) / 2);

    imagecopyresampled($dst, $src, $thu_x, $thu_y, 0, 0, $thu_w, $thu_h,
        $src_info[0], $src_info[1]);
    $src_info = pathinfo($image);
    $thumb_file = $src_info['filename'] . '_thumb.' . $src_info['extension'];
    imagejpeg($dst, $path . '' . $thumb_file);
    imagedestroy($dst);
    imagedestroy($src);
}

thumb('desktop.jpg', './');

?>