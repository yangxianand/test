<?php
namespace vendor;

class Uploader{
    public static $error;
    private static $types = array('image/jpg','image/jpeg','image/pjpeg');
    public static function setTypes(array $types = array()){
        if(!empty($types)) self::$types = $types;
    }

    public static function uploadOne(array $file,string $path,int $max = 2000000){
        if(!isset($file['error']) || count($file) != 5){
            self::$error = '错误的上传文件！';
            return false;
        }
        if(!is_dir($path)){
            self::$error = '存储路径不存在！';
            return false;
        }
        switch($file['error']){
            case 1:
            case 2:
                self::$error = '文件超过服务器允许大小！';
                return false;
            case 3:
                self::$error = '文件只有部分被上传！';
                return false;
            case 4:
                self::$error = '没有选中要上传的文件！';
                return false;
            case 6:
            case 7:
                self::$error = '服务器错误！';
                return false;
        }
        if(!in_array($file['type'],self::$types)){
            self::$error = '当前上传的文件类型不允许！';
            return false;
        }
        if($file['size'] > $max){
            self::$error = '当前上传的文件超过允许的大小！当前允许的大小是：' . (string)($max / 1000000) . 'M';
            return false;
        }
        $filename = self::getRandomName($file['name']);
        if(move_uploaded_file($file['tmp_name'],$path . '/' . $filename)){
            return $filename;
        }else{
            self::$error = '文件移动失败！';
            return false;
        }

    }

    public static function getRandomName($filename,$prefix = 'image'){
        $ext = strrchr($filename, '.');
        $newname = $prefix . date('YmdHis');
        for($i = 0;$i < 6;$i++){
            $newname .= chr(mt_rand(65,90));
        }
        return  $newname . $ext;
    }

}
