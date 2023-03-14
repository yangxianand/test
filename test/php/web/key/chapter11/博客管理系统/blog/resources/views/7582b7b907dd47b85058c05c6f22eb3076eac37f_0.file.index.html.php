<?php
/* Smarty version 3.1.32, created on 2020-05-07 14:17:29
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\user\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb3a7f901b5b6_95134151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7582b7b907dd47b85058c05c6f22eb3076eac37f' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\user\\index.html',
      1 => 1588832246,
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
function content_5eb3a7f901b5b6_95134151 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户列表</title>
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
                        <h2>用户管理</h2><p>用户列表</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simplebox grid740">
                    <div class="titleh">
                        <h3>用户列表</h3>
                    </div>
                    <table id="myTable" class="tablesorter">
                        <thead>
                        <tr>
                            <th>#ID</th><th>用户名</th>
                            <th>角色</th><th>注册时间</th><th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 用户列表 -->
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$__foreach_user_0_saved = $_smarty_tpl->tpl_vars['user'];
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->key+1;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['u_username'];?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['user']->value['u_is_admin']) {?>管理员<?php } else { ?>普通用户<?php }?></td>
                            <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['user']->value['u_regtime']);?>
</td>
                            <td>
                                <a href="index.php?p=admin&c=user&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"
                                   onclick="return confirm('确认删除当前用户：<?php echo $_smarty_tpl->tpl_vars['user']->value['u_username'];?>
？')">删除</a>
                            </td>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                    </table>
                    <!-- 分页 -->
                    <ul class="pagination">
                        <?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>

                    </ul>
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
