<?php
/* Smarty version 3.1.32, created on 2020-05-06 16:46:34
  from 'C:\web\apache2.4\htdocs\blog\app\home\view\Index\detail.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb2796a9535f4_29253455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d87018169b7a8684bbe3450982949035d2ef997' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\home\\view\\Index\\detail.html',
      1 => 1588754738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb2796a9535f4_29253455 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>博文内容</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link href="<?php echo P;?>
/css/app.css" rel="stylesheet" media="screen">
    <?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/modernizr.custom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/detectizr.min.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="page-wrapper">
    <header class="navbar">
        <div class="topbar">
            <div class="container">
                <a href="index.php" class="site-logo">博文前台</a>
            </div>
        </div>
    </header>
    <section class="page-title">
        <div class="container">
            <div class="inner">
                <div class="column">
                    <div class="title"><h1>博文内容</h1></div>
                </div>
                <div class="column"></div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['a_title'];?>
</h1>
                <div class="post-meta">
                    <div class="column">
            <span>
              <i class="icon-head"></i>
              <a href="#"><?php echo $_smarty_tpl->tpl_vars['article']->value['a_author'];?>
</a>
            </span>
                        <span>在</span>
            <span>
              <i class="icon-ribbon"></i>
              <a href="#">
                  <?php echo $_SESSION['category'][$_smarty_tpl->tpl_vars['article']->value['c_id']]['c_name'];?>

              </a>
            </span>
                        <span>下发布</span>
            <span class="post-comments">
              <i class="icon-speech-bubble"></i>
              <a href="#">12</a>
            </span>
                    </div>
                    <div class="column">
                        <span><?php echo date('Y m d',$_smarty_tpl->tpl_vars['article']->value['a_time']);?>
</span>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['article']->value['a_img']) {?>
                <img src="<?php echo URL;?>
uploads/<?php echo $_smarty_tpl->tpl_vars['article']->value['a_img'];?>
" alt="Image">
                <?php }?>
                <p><?php echo $_smarty_tpl->tpl_vars['article']->value['a_content'];?>
</p>
                <div class="column"></div>
            </div>
            <div class="post-tools space-top-2x">
                <div class="column"></div>
                <div class="column text-center">
                    <a><i class="fa fa-thumbs-up dz" aria-hidden="true">（32）</i></a>
                </div>
                <div class="column"></div>
            </div>
            <!-- 评论模块 -->

            <a href="#" class="scroll-to-top-btn">
                <i class="icon-arrow-up"></i>
            </a>
            <!-- footer -->
            <footer class="footer">
                <div class="bottom-footer">
                    <div class="container">
                        <div class="copyright">
                            <div class="column">
                                <p>&copy; 2016. 保留所有权利。</p>
                            </div>
                            <div class="column"></div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
</div>
</body>
<!-- 引入静态资源 -->
<?php echo '<script'; ?>
 src="js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/vendor/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/vendor/waves.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/vendor/placeholder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/vendor/waypoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/vendor/velocity.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/scripts.js"><?php echo '</script'; ?>
>

</html>
<?php }
}
