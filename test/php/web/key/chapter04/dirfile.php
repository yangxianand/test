<?php

function dirfile($dir)
{
    if (!is_dir($dir)) {
        return;
    }
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') {
            continue;
        }
        $tmp_dir = $dir . '/' . $file;
        echo $tmp_dir, '<br>';
        if (is_dir($tmp_dir)) {
            dirfile($tmp_dir);
        }
    }
}
dirfile('.');	// ���ú������ݹ鵱ǰĿ¼
