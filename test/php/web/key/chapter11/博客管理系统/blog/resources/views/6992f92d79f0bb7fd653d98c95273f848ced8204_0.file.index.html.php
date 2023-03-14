<?php
/* Smarty version 3.1.32, created on 2020-04-28 10:37:17
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\Index\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ea796dde12943_97960569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6992f92d79f0bb7fd653d98c95273f848ced8204' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\Index\\index.html',
      1 => 1587980786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5ea796dde12943_97960569 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>博客后台</title>
    <link rel="stylesheet" type="text/css" href="<?php echo P;?>
/css/app.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo P;?>
/js/app.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="wrapper">
    <?php $_smarty_tpl->_subTemplateRender('file:../public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="main">
        <?php $_smarty_tpl->_subTemplateRender("file:../public/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div id="page">
            <div class="page-title">
                <div class="in">
                    <div class="titlebar">
                        <h2>控制面板</h2>
                        <p>小标题</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simple-tips">
                    <h2>提示</h2>
                    <ul>
                        <li>1. 使用左侧的导航菜单进入功能</li>
                        <li>2. 使用右上角的退出按钮退出管理后台</li>
                    </ul>
                    <a href="#" class="close tips" title="关闭">关闭</a>
                </div>
                <div class="simple-tips">
                    <h2>提示</h2>
                    <ul>
                        <li>1. 您当前使用的ip: <?php echo $_SERVER['REMOTE_ADDR'];?>
</li>
                        <li>2. PHP版本: <?php echo PHP_VERSION;?>
</li>
                        <li>3. 浏览器: <?php echo $_SERVER['HTTP_USER_AGENT'];?>
</li>
                    </ul>
                    <a href="#" class="close tips" title="关闭">关闭</a>
                </div>
                <div class="grid740">
                    <span class="dashbutton">
                        <img src="<?php echo P;?>
/img/icons/dashbutton/users.png" width="44" height="32" alt="icon" />	<b>用户数</b><?php echo $_smarty_tpl->tpl_vars['counts']->value;?>

                    </span>
                    <div class="clear"></div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="footer">
        <div class="left-column">© Copyright 2020 - 保留所有权利.</div>
    </div>
</div>
</body>
</html>
<?php }
}
