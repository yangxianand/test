<?php
function dirfile($dir, &$error, $level = 0){
    if(!is_dir($dir)){
        $error = '路径无效';
        return false;
    }
    static $output = array();
    $files = scandir($dir);

    foreach($files as $file){
        $tmp_file = $dir . '/' . $file;
        if(is_dir($tmp_file)){
            $output[] = array(
                'filename' => $file,
                'directory' => $dir,
                'is_dir' => true,
                'level' => $level,
            );
            if($file == '.' || $file == '..') continue;
            dirfile($tmp_file, $error, $level + 1);
        }else{
            $output[] = array(
                'filename' => $file,
                'directory' => $dir,
                'is_dir' => false,
                'level' => $level,
            );
        }
    }
    return $output;
}
