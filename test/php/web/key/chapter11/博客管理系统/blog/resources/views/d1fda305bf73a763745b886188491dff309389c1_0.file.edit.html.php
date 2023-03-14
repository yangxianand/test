<?php
/* Smarty version 3.1.32, created on 2020-04-29 12:28:31
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\category\edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ea9026fedafa5_97689613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1fda305bf73a763745b886188491dff309389c1' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\category\\edit.html',
      1 => 1588134509,
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
function content_5ea9026fedafa5_97689613 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>编辑分类</title>
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
                        <h2>分类管理</h2><p>编辑分类</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simplebox grid740" style="z-index: 720;">
                    <div class="titleh" style="z-index: 710;">
                        <h3>编辑分类</h3>
                    </div>
                    <div class="body" style="z-index: 690;">
                        <form id="form2" name="form2" method="post" action="">
                            <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <input type="hidden" name="p"  value="admin">
                            <input type="hidden" name="c"  value="category">
                            <input type="hidden" name="a"  value="update">
                            <div class="st-form-line" style="z-index: 680;">
                                <span class="st-labeltext">名称</span>
                                <input name="c_name" type="text" class="st-forminput" style="width:510px" value="<?php echo $_SESSION['category'][$_smarty_tpl->tpl_vars['id']->value]['c_name'];?>
">
                                <div class="clear" style="z-index: 670;"></div>
                            </div>
                            <div class="st-form-line" style="z-index: 640;">
                                <span class="st-labeltext">父分类</span>
                                <select name="c_parent_id" class="uniform">
                                    <option value="0">无</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['id'] == $_SESSION['category'][$_smarty_tpl->tpl_vars['id']->value]['c_parent_id']) {?>selected="selected"<?php }?>>
                                    <?php echo str_repeat('----',$_smarty_tpl->tpl_vars['value']->value['level']);
echo $_smarty_tpl->tpl_vars['value']->value['c_name'];?>

                                    </option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                </select>
                                <div class="clear"></div>
                            </div>
                            <div class="st-form-line" style="z-index: 680;">
                                <span class="st-labeltext">排序</span>
                                <input name="c_sort" style="width:510px"class="st-forminput"
                                       type="text" value="<?php echo $_SESSION['category'][$_smarty_tpl->tpl_vars['id']->value]['c_sort'];?>
">
                                <div class="clear" style="z-index: 670;"></div>
                            </div>
                            <div class="button-box" style="z-index: 460;">
                                <input type="submit"  id="button" value="提交" class="st-button">
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
