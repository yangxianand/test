<?php
function getFileExt($path)
{
    // ��ȡ�ļ���չ��
    $ext = substr($path, strrpos($path, '.') + 1);
    // ���ػ�ȡ���
    return $ext;
}
// �����ļ�·��
$path = 'C:\images\apple.jpg';
// ���ú���getFileExt()��ȡ�ļ���չ��
$ext = getFileExt($path);
?>
<title>��ȡ�ļ���չ��</title>
<h1>��ȡ�ļ���չ��</h1>
<p>�ļ�·����<?php echo $path; ?></p>
<p>�ļ���չ����<?php echo $ext; ?></p>