<?php
function getFileExt($path)
{
    // 获取文件扩展名
    $ext = substr($path, strrpos($path, '.') + 1);
    // 返回获取结果
    return $ext;
}
// 保存文件路径
$path = 'C:\images\apple.jpg';
// 调用函数getFileExt()获取文件扩展名
$ext = getFileExt($path);
?>
<title>获取文件扩展名</title>
<h1>获取文件扩展名</h1>
<p>文件路径：<?php echo $path; ?></p>
<p>文件扩展名：<?php echo $ext; ?></p>