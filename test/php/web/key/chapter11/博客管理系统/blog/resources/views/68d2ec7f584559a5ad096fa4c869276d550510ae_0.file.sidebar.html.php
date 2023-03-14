<?php
/* Smarty version 3.1.32, created on 2020-05-08 14:27:04
  from 'C:\web\apache2.4\htdocs\blog\app\admin\view\public\sidebar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb4fbb86084a5_43392695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68d2ec7f584559a5ad096fa4c869276d550510ae' => 
    array (
      0 => 'C:\\web\\apache2.4\\htdocs\\blog\\app\\admin\\view\\public\\sidebar.html',
      1 => 1588756996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb4fbb86084a5_43392695 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="sidebar">
    <div id="searchbox" style="z-index: 880;">
        <div class="in" style="z-index: 870;">
            <p class="text-center font18 line-height35">此广告位常年招商</p>
        </div>
    </div>
    <div id="sidemenu">
        <ul>
            <li class="active"><a href=""><img src="<?php echo P;?>
/img/icons/sidemenu/laptop.png" width="16" height="16" alt="icon"/>控制面板</a></li>
            <?php if ($_SESSION['user']['u_is_admin']) {?>
            <li class="subtitle">
                <a class="action tips-right" href="#" title="分类管理"><img src="<?php echo P;?>
/img/icons/sidemenu/key.png" width="16" height="16" alt="icon"/>分类管理<img src="<?php echo P;?>
/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /></a>
                <ul class="submenu display-block">
                    <li><a href="index.php?p=admin&c=category"><img src="<?php echo P;?>
/img/icons/sidemenu/file.png" width="16" height="16" alt="icon"/>分类列表</a></li>

                    <li><a href="index.php?p=admin&c=category&a=add"><img src="<?php echo P;?>
/img/icons/sidemenu/file_add.png" width="16" height="16" alt="icon"/>添加分类</a></li>

                </ul>
            </li>
            <?php }?>
            <li class="subtitle">
                <a class="action tips-right" href="#" title="博文管理"><img src="<?php echo P;?>
/img/icons/sidemenu/mail.png" width="16" height="16" alt="icon"/>博文管理<img src="<?php echo P;?>
/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /></a>
                <ul class="submenu display-block">
                    <li><a href="index.php?p=admin&c=article&a=add"><img src="<?php echo P;?>
/img/icons/sidemenu/file_add.png" width="16" height="16" alt="icon"/>添加博文</a></li>
                    <li><a href="index.php?p=admin&c=article"><img src="<?php echo P;?>
/img/icons/sidemenu/file.png" width="16" height="16" alt="icon"/>博文列表</a></li>
                </ul>
            </li>
            <?php if ($_SESSION['user']['u_is_admin']) {?>
            <li class="subtitle">
                <a class="action tips-right" href="#" title="用户管理"><img src="<?php echo P;?>
/img/icons/sidemenu/user.png" width="16" height="16" alt="icon"/>用户管理<img src="<?php echo P;?>
/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /></a>
                <ul class="submenu display-block">
                    <li>
                        <a href="index.php?p=admin&c=user&a=add">
                            <img width="16" height="16" alt="icon"
                                 src="<?php echo P;?>
/img/icons/sidemenu/user_add.png" />添加用户
                        </a>
                    </li>
                    <li>
                        <a href="index.php?p=admin&c=user">
                            <img width="16" height="16" alt="icon"
                                 src="<?php echo P;?>
/img/icons/sidemenu/file.png"/>用户列表
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="index.php?p=admin&c=comment"><img width="16" height="16" alt="icon" src="<?php echo P;?>
/img/icons/sidemenu/file.png"/>评论列表</a>
            </li>
            <?php }?>
        </ul>
    </div>
</div><?php }
}
