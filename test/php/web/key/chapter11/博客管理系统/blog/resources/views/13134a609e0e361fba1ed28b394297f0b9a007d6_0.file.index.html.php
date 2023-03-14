<?php
/* Smarty version 3.1.32, created on 2020-05-06 17:28:46
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\comment\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb2834eabdfa3_99503837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13134a609e0e361fba1ed28b394297f0b9a007d6' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\comment\\index.html',
      1 => 1588757295,
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
function content_5eb2834eabdfa3_99503837 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>评论列表</title>
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
                        <h2>评论管理</h2><p>评论列表</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simplebox grid740">
                    <div class="titleh"><h3>评论列表</h3></div>
                    <table id="myTable" class="tablesorter">
                        <thead>
                        <tr>
                            <th>#ID</th><th>作者</th>
                            <th>内容</th><th>博文名</th>
                            <th>评论时间</th><th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 评论列表 -->

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['c']->value['u_username'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['c']->value['c_comment'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['c']->value['a_title'];?>
</td>
                            <td><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['c']->value['c_time']);?>
</td>
                            <td><a href="index.php?p=admin&c=comment&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" onclick="return confirm('确认删除当前评论？')">删除</a>
                            </td>
                        </tr>
                        <?php
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
