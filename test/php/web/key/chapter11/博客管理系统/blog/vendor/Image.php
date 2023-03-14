<?php
namespace vendor;

class Image{
    private static $ext = array(
        'jpg' => 'jpeg',
        'jpeg'=> 'jpeg',
        'png' => 'png',
        'gif' => 'gif'
    );
    public static $error;

    public static function makeThumb($file,$path,$width = 90,$height = 90){
        if(!is_file($file)){
            self::$error = '图片资源不存在！';
            return false;
        }
        if(!is_dir($path)){
            self::$error = '存储路径不存在！';
            return false;
        }
        $file_info = pathinfo($file);
        $img_info = getimagesize($file);
        if(!array_key_exists($file_info['extension'],self::$ext)){
            self::$error = '当前文件不能制作缩略图！';
            return false;
        }
        //明确原图资源函数：打开函数和保存函数
        $open = 'imagecreatefrom' . self::$ext[$file_info['extension']];
        $save = 'image' . self::$ext[$file_info['extension']];
        //打开图片资源
        $src = $open($file);
        $thumb = imagecreatetruecolor($width,$height);
        //背景补白
        $bg_color = imagecolorallocate($thumb,255,255,255);
        imagefill($thumb,0,0,$bg_color);
        //补白计算：计算宽高比
        $src_b = $img_info[0] / $img_info[1];
        $thumb_b = $width / $height;
        //原图宽高比大于缩略图：原图太宽，缩略图的宽度要占满
        if($src_b > $thumb_b){
            //缩略图实际宽高
            $w = $width;
            $h = ceil($width / $src_b);
            //缩略图起始位置
            $x = 0;
            $y = ceil(($height - $h) / 2);
        }else{
            //原图宽高比小于缩略图：原图太高，缩略图的高度要占满
            $w = ceil($src_b * $width);
            $h = $height;
            $x = ceil(($width - $w) / 2);
            $y = 0;
        }
        //复制合并：缩略图
        if(!imagecopyresampled($thumb,$src,$x,$y,0,0,$w,$h,$img_info[0], $img_info[1])){
            //采样复制失败
            self::$error = '缩略图制作失败！';
            return false;
        }
        //保存图片
        $res = $save($thumb,$path . 'thumb_' . $file_info['basename']);
        //销毁资源
        imagedestroy($src);
        imagedestroy($thumb);
        //判定结果
        if($res){
            return 'thumb_' . $file_info['basename'];
        }else{
            self::$error = '图片保存失败！';
            return false;
        }
    }

}
