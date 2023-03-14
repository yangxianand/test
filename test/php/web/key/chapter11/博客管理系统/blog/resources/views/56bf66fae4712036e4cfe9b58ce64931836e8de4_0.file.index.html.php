<?php
/* Smarty version 3.1.32, created on 2020-05-05 16:51:16
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\category\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb129044d2d18_90076085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56bf66fae4712036e4cfe9b58ce64931836e8de4' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\category\\index.html',
      1 => 1588668674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
    'file:../Public/sidebar.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5eb129044d2d18_90076085 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>分类列表</title>
    <link rel="stylesheet" type="text/css" href="<?php echo P;?>
/css/app.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="j<?php echo P;?>
/s/app.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="wrapper">
    <?php $_smarty_tpl->_subTemplateRender('file:../Public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="main">
        <?php $_smarty_tpl->_subTemplateRender("file:../Public/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div id="page">
            <div class="page-title">
                <div class="in">
                    <div class="titlebar">
                        <h2>分类管理</h2>	<p>分类列表</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simplebox grid740">
                    <div class="titleh">
                        <h3>分类列表</h3>
                    </div>
                    <table id="myTable" class="tablesorter">
                        <thead>
                        <tr>
                            <th>#ID</th><th>名称</th><th>下属博文数量</th>
                            <th>排序</th><th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 输出分类列表 -->
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['category'], 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
</td>
                            <td><?php echo str_repeat('----',$_smarty_tpl->tpl_vars['cat']->value['level']);
echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>
</td>
                            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['c_count']->value[$_smarty_tpl->tpl_vars['cat']->value['id']])===null||$tmp==='' ? 0 : $tmp);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['cat']->value['c_sort'];?>
</td>
                            <td><a href="index.php?p=admin&c=category&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">编辑</a><a href="index.php?p=admin&c=category&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" onclick="return confirm('确定删除分类：<?php echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>
？')">删除</a></td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
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
