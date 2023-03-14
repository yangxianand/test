<?php
/* Smarty version 3.1.32, created on 2020-04-28 10:37:17
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\public\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ea796dde83de0_80647112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7f2e538e4afed74a8ea7f9912ee80de1e5c45a9' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\public\\header.html',
      1 => 1587980711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea796dde83de0_80647112 (Smarty_Internal_Template $_smarty_tpl) {
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
            <span><?php if ($_SESSION['user']['u_is_admin']) {?>管理员<?php } else { ?>用户<?php }?></span><b>昵称：<?php echo $_SESSION['user']['u_username'];?>
</b>
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
