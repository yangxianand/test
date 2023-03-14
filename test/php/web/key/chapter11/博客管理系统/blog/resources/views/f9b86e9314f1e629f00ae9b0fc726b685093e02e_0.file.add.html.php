<?php
/* Smarty version 3.1.32, created on 2020-05-05 17:03:24
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\user\add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb12bdcb78a12_12603469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9b86e9314f1e629f00ae9b0fc726b685093e02e' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\user\\add.html',
      1 => 1588669396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5eb12bdcb78a12_12603469 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加用户</title>
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
                        <h2>用户管理</h2><p>添加用户</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simplebox grid740" style="z-index: 720;">
                    <div class="titleh" style="z-index: 710;">
                        <h3>添加用户</h3>
                    </div>
                    <div class="body" style="z-index: 690;">
                        <!-- 添加用户 -->
                        <form id="form2" name="form2" method="post"
                              action="index.php?p=admin&c=user&a=insert">
                            <div class="st-form-line" style="z-index: 680;">
                                <span class="st-labeltext">用户名</span>
                                <input name="u_username" type="text" class="st-forminput"
                                       style="width:510px" value="">
                                <div class="clear" style="z-index: 670;"></div>
                            </div>
                            <div class="st-form-line" style="z-index: 680;">
                                <span class="st-labeltext">密码</span>
                                <input name="u_password" type="text" class="st-forminput"
                                       style="width:510px" value="">
                                <div class="clear" style="z-index: 670;"></div>
                            </div>
                            <div class="st-form-line" style="z-index: 680;">
                                <span class="st-labeltext">角色</span>
                                <label class="margin-right10"><input type="radio" value="0" checked
                                                                     name="u_is_admin" class="uniform"/> 普通用户</label>
                                <label class="margin-right10"><input type="radio" value="1"
                                                                     name="u_is_admin" class="uniform"/> 管理员</label>
                                <div class="clear" style="z-index: 670;"></div>
                            </div>
                            <div class="button-box" style="z-index: 460;">
                                <input type="submit" id="button" value="提交" class="st-button">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
</body>
</html>
<?php }
}
