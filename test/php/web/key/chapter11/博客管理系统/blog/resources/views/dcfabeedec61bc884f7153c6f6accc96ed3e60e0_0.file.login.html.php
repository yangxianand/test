<?php
/* Smarty version 3.1.32, created on 2020-04-28 15:04:03
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\privilege\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ea7d56335a3f5_04638439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcfabeedec61bc884f7153c6f6accc96ed3e60e0' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\privilege\\login.html',
      1 => 1588056278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea7d56335a3f5_04638439 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>博客后台</title>
    <link rel="stylesheet" type="text/css" href="<?php echo P;?>
/css/app.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo P;?>
/js/app.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="loginform">
    <div class="title">
        <span class="logo-text font18">博客后台管理系统</span>
    </div>
    <div class="body">
        <form id="form1" name="form1" method="post" action="index.php?p=admin&c=privilege&a=check">
            <label class="log-lab">用户名</label>
            <input name="u_username" type="text" class="login-input-user" id="textfield" value=""/>
            <label class="log-lab">密码</label>
            <input name="u_password" type="password" class="login-input-pass" id="textfield" value=""/>
            <label class="log-lab">验证码</label>
            <div class="padding-bottom5">
                <img src="index.php?p=admin&c=privilege&a=captcha" width="200" height="50" onclick="this.src='index.php?p=admin&c=privilege&a=captcha&'+Math.random()">
            </div>
            <input name="captcha" type="text" class="login-input" value=""/>
            <label class="log-lab"><input type="checkbox" name="rememberMe" class="uniform"> 7天内自动登录</label>
            <input type="submit" name="button" id="button" value="登录" class="button"/>
        </form>
    </div>
</div>
</body>
</html>
<?php }
}
