<?php
/* Smarty version 3.1.32, created on 2020-05-07 16:01:38
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\article\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb3c062eb7801_05593679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '193f10384f45ac1f92e60728412a6bb6344fb31c' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\article\\index.html',
      1 => 1588838497,
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
function content_5eb3c062eb7801_05593679 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>博文列表</title>
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
                        <h2>博文管理</h2><p>博文列表</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content">
                <div class="simplebox grid740" style="z-index: 720;">
                    <div class="titleh" style="z-index: 710;">
                        <h3>搜索</h3>
                    </div>
                    <div class="body" style="z-index: 690;">
                        <!-- 博文搜索表单 -->
                        <form name="form2" method="post" action="index.php?p=admin&c=article">
                            <div class="st-form-line" style="z-index: 680;">
                                <span class="st-labeltext">标题</span>
                                <input name="a_title" type="text" class="st-forminput" style="width:510px" value="<?php if (isset($_smarty_tpl->tpl_vars['cond']->value['a_title'])) {
echo $_smarty_tpl->tpl_vars['cond']->value['a_title'];
}?>">
                                <div class="clear" style="z-index: 670;"></div>
                            </div>
                            <div class="st-form-line" style="z-index: 640;">
                                <span class="st-labeltext">分类</span>
                                <select class="uniform" name="c_id">
                                    <option value="0">任意</option>
                                    <!-- 分类下列列表 -->
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['category'], 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['cond']->value['c_id']) && $_smarty_tpl->tpl_vars['cond']->value['c_id'] == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected="selected"<?php }?>>
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
                            <div class="st-form-line">
                                <span class="st-labeltext">状态</span>
                                <select class="uniform" name="a_status">
                                    <option value="0">任意</option>
                                    <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['cond']->value['a_status']) && $_smarty_tpl->tpl_vars['cond']->value['a_status'] == 1) {?>selected="selected"<?php }?>>草稿</option>
                                    <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['cond']->value['a_status']) && $_smarty_tpl->tpl_vars['cond']->value['a_status'] == 2) {?>selected="selected"<?php }?>>公开</option>
                                    <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['cond']->value['a_status']) && $_smarty_tpl->tpl_vars['cond']->value['a_status'] == 3) {?>selected="selected"<?php }?>>隐藏</option>

                                </select>
                                <div class="clear"></div>
                            </div>
                            <!-- 文章状态列表 -->
                            <div class="st-form-line" style="z-index: 620;">
                                <span class="st-labeltext">置顶</span>
                                <label class="margin-right10">
                                    <div class="radio">
                                        <span><input type="radio" name="a_toped" class="uniform" value="" checked></span>
                                    </div> 不限
                                </label>
                                <label class="margin-right10">
                                    <div class="radio">
                                        <span>    <input type="radio" name="a_toped" class="uniform" value="1" <?php if (isset($_smarty_tpl->tpl_vars['cond']->value['a_toped']) && $_smarty_tpl->tpl_vars['cond']->value['a_toped'] == 1) {?>checked="checked"<?php }?>></span>
                                    </div> 置顶
                                </label>
                                <label class="margin-right10">
                                    <div class="radio">
                                        <span><input type="radio" name="a_toped" class="uniform" value="2" <?php if (isset($_smarty_tpl->tpl_vars['cond']->value['a_toped']) && $_smarty_tpl->tpl_vars['cond']->value['a_toped'] == 2) {?>checked="checked"<?php }?>></span>
                                    </div> 不置顶
                                </label>
                                <div class="clear" style="z-index: 610;"></div>
                            </div>
                            <div class="button-box" style="z-index: 460;">
                                <input type="submit" id="button" value="提交" class="st-button">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="simplebox grid740">
                    <div class="titleh">
                        <h3>博文列表</h3>
                    </div>
                    <table id="myTable" class="tablesorter">
                        <thead>
                        <tr>
                            <th>#ID</th><th>作者</th><th>分类</th>
                            <th>标题</th><th>发布日期</th><th>评论数量</th>
                            <th>状态</th><th>操作</th>
                        </tr>
                        </thead>
                        <!-- 博文列表 -->
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'art');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['art']->value['a_author'];?>
</td>
                            <td><?php echo $_SESSION['category'][$_smarty_tpl->tpl_vars['art']->value['c_id']]['c_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['art']->value['a_title'];?>
</td>
                            <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['art']->value['a_time']);?>
</td>
                            <td>12</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['art']->value['a_status'] == 1) {?>草稿
                                <?php } elseif ($_smarty_tpl->tpl_vars['art']->value['a_status'] == 2) {?>公开
                                <?php } else { ?>隐藏<?php }?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['art']->value['u_id'] == $_SESSION['user']['id']) {?>
                                <a href="index.php?p=admin&c=article&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
" onclick="return confirm('确认删除文章：<?php echo $_smarty_tpl->tpl_vars['art']->value['a_title'];?>
？');">删除</a>
                                <a href="index.php?p=admin&c=article&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
">编辑</a>
                                <?php }?>
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
