<?php
/* Smarty version 3.1.32, created on 2020-04-30 11:40:39
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\article\edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eaa48b7854d86_77208411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbe53b169032e83cee5bc181af0277cc37cc3101' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\article\\edit.html',
      1 => 1588218030,
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
function content_5eaa48b7854d86_77208411 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>编辑博文</title>
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
    <?php $_smarty_tpl->_subTemplateRender("file:../public/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="page">
        <div class="page-title">
            <div class="in">
                <div class="titlebar">
                    <h2>博文管理</h2><p>编辑博文</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="content">
            <div class="simplebox grid740" style="z-index: 720;">
                <div class="titleh" style="z-index: 710;">
                    <h3>编辑博文</h3>
                </div>
                <div class="body" style="z-index: 690;">
                    <!-- 编辑博文表单 -->
                    <form id="form2" name="form2" method="post" action="index.php?p=admin&c=article&a=update">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                        <div class="st-form-line" style="z-index: 680;">
                            <span class="st-labeltext">标题</span>
                            <input name="a_title" type="text" class="st-forminput" style="width:510px" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['a_title'];?>
">
                            <div class="clear" style="z-index: 670;"></div>
                        </div>
                        <!-- 博文分类下拉列表框 -->
                        <div class="st-form-line" style="z-index: 640;">
                            <span class="st-labeltext">分类</span>
                            <select class="uniform" name="c_id">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['category'], 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"
                                        <?php if ($_smarty_tpl->tpl_vars['value']->value['id'] == $_smarty_tpl->tpl_vars['article']->value['c_id']) {?>selected="selected"<?php }?>>
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


                        <!-- 博文状态下拉列表框 -->
                        <div class="st-form-line">
                            <span class="st-labeltext">状态</span>
                            <select class="uniform" name="a_status">
                                <option value="1"
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['a_status'] == 1) {?>selected="selected"<?php }?>>草稿</option>
                                <option value="2"
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['a_status'] == 2) {?>selected="selected"<?php }?>>公开</option>
                                <option value="3"
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['a_status'] == 3) {?>selected="selected"<?php }?>>隐藏</option>
                            </select>
                            <div class="clear"></div>
                        </div>

                        <!-- 博文置顶选项 -->
                        <div class="st-form-line" style="z-index: 620;">
                            <span class="st-labeltext">置顶</span>
                            <label class="margin-right10">
                                <div class="radio">
                                    <span><input type="radio" name="a_toped" class="uniform" value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_toped'] == 1) {?>checked="checked"<?php }?>></span>
                                </div> 置顶
                            </label>
                            <label class="margin-right10">
                                <div class="radio">
                                    <span><input type="radio" name="a_toped" class="uniform" value="2" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_toped'] == 2) {?>checked="checked"<?php }?>></span>
                                </div> 不置顶
                            </label>
                            <div class="clear" style="z-index: 610;"></div>
                        </div>

                        <!-- 博文图片 -->
                        <div class="simplebox grid740">
                            <div class="titleh">
                                <h3>内容</h3>
                            </div>
                            <div class="body">
                                <textarea class="st-forminput" rows="5" cols="47" name="a_content" style="width:96.5%;"><?php echo $_smarty_tpl->tpl_vars['article']->value['a_content'];?>
</textarea>
                            </div>
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
    <?php $_smarty_tpl->_subTemplateRender("file:../public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
</body>
</html>
<?php }
}
