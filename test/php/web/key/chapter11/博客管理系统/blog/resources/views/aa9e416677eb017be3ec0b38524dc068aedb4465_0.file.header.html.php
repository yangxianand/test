<?php
/* Smarty version 3.1.32, created on 2020-04-27 16:21:21
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\Public\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ea69601641c46_63144760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa9e416677eb017be3ec0b38524dc068aedb4465' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\Public\\header.html',
      1 => 1587975610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea69601641c46_63144760 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="header">
    <div class="logo">
        <a href="index.php?p=admin"><span class="logo-text text-center font18">博客后台</span></a>
    </div>
    <div id="notifications"><div class="clear"></div></div>
    <div id="quickmenu">
        <a href="index.php?p=admin&c=article&a=add" class="qbutton-left tips" title="新增一篇博客"><img src="<?php echo P;?>
/img/icons/header/newpost.png" width="18" height="14" alt="new post" /></a>
        <a href="index.php" class="qbutton-right tips" title="直达前台"><img src="<?php echo P;?>
/img/icons/sidemenu/magnify.png" width="18" height="14" alt="new post" /></a>
        <div class="clear"></div>
    </div>
    <div id="profilebox">
        <a href="#" class="display">
            <img src="<?php echo P;?>
/img/simple-profile-img.jpg" width="33" height="33" alt="profile"/>
            <span>管理员</span><b>昵称：</b>
        </a>
        <div class="profilemenu">
            <ul>
                <li><a href="<?php echo URL;?>
index.php?p=admin&c=privilege&a=logout">退出</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php }
}
