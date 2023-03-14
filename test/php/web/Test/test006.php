<?php
$path="C:\Users\软件21-杨贤.jpg";
$num=strrpos($path,'.')+1;
$text=substr($path,$num);
echo '文件扩展名为：'.$text;


?>