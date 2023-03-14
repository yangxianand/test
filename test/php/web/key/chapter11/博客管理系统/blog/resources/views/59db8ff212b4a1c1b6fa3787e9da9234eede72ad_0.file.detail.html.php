<?php
/* Smarty version 3.1.32, created on 2020-05-08 14:01:29
  from 'C:\web\apache2.4\htdocs\blog\app\home\view\Index\detail.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb4f5b9889be3_04055834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59db8ff212b4a1c1b6fa3787e9da9234eede72ad' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\home\\view\\Index\\detail.html',
      1 => 1588917686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb4f5b9889be3_04055834 (Smarty_Internal_Template $_smarty_tpl) {
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
              <a href="#"><?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
</a>
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
                    <a><i class="fa fa-thumbs-up dz" aria-hidden="true" id="">（32）</i></a>
                </div>
                <div class="column"></div>
            </div>
            <!-- 评论模块 -->
            <div class="comments-area space-top-3x">
                <!-- 评论列表 -->
                <h4 class="comments-count">共有<?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
条评论</h4>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                <div class="comment">
                    <div class="comment-meta">
                        <div class="column">
                        <span class="comment-autor"><i class="icon-head"></i>
                          <a href="#"><?php echo $_smarty_tpl->tpl_vars['c']->value['u_username'];?>
</a>
                        </span>
                        </div>
                        <div class="column">
                            <span class="comment-date"><?php echo date('d.m.Y',$_smarty_tpl->tpl_vars['c']->value['c_time']);?>
</span>
                        </div>
                    </div>
                    <div class="comment-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['c']->value['c_comment'];?>
</p>
                    </div>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <div class="comment-respond">
                    <h4 class="comment-reply-title">发布新评论</h4>
                    <!-- 发表评论表单 -->
                    <form method="post" id="comment-form" class="comment-form"
                          action="index.php?c=comment&a=insert">
                        <input type="hidden" name="a_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                        <div class="form-group">
                            <label for="cf_comment" class="sr-only">Comment</label>
                            <textarea name="c_comment" id="cf_comment" class="form-control input-alt" rows="7" placeholder="输入您的评论"></textarea>
                        </div>
                        <p class="form-submit">
                            <?php if (isset($_SESSION['user'])) {?>
                            <input name="submit" type="submit" id="submit" class="btn btn-primary btn-block" value="发布">
                            <?php } else { ?>
                            <input type="button" onclick="JavaScript:return false" class="btn btn-primary btn-block" value="请先登录">
                            <?php }?>
                        </p>
                    </form>

                </div>
            </div>

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
 src="<?php echo P;?>
/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/waves.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/placeholder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/waypoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo P;?>
/js/vendor/velocity.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo P;?>
/js/scripts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $(".dz").bind("click",function(){
            $.get("/index.php?c=index&a=like&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
",{},function(result){
                var dataObj=eval("("+result+")");
                console.log(dataObj.count);
                var count = dataObj.count;
                $(".dz").html("("+count+")");
            });
        });

    });
<?php echo '</script'; ?>
>
</html>
<?php }
}
