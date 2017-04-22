<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 16:53:31
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127155670758f8d3e8599837-82394470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '765d26d0083524bfcd1f229458860691c8147e62' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/menu.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127155670758f8d3e8599837-82394470',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f8d3e879a423_02422530',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8d3e879a423_02422530')) {function content_58f8d3e879a423_02422530($_smarty_tpl) {?><header>
    <nav class="navbar navbar-fixed-top text-center">
        <div class="container-fluid header cbp-af-header">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                        aria-expanded="false">

                    <span class="sr-only"></span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="hidden-sm hidden-md hidden-lg" id="title">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
index.php"><h2>Eventify</h2></a>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-3 hidden-xs">
                    <div id="title">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
index.php"><h2>Eventify</h2></a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="row">
                        <div class="collapse navbar-collapse" id="menu">
                            <div class="col-sm-5 search">
                                <form class="navbar-form navbar-center" role="search"
                                      action="../../pages/search.php#eventosPesq">
                                    <div class="form-group input-group">
                                        <input type="text" class="form-control" placeholder="Search Event...">
                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" type="submit">
                                                              <span class="glyphicon glyphicon-search"></span>
                                                            </button>
                                                        </span>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-5 pull-right">
                                <ul class="nav navbar-nav navbar-right" id="login">

                                    <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/user/my-page-my-information.php"><span
                                                        class="glyphicon glyphicon-pencil"></span><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>

                                            </a>
                                        </li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/authentication/logout.php"><span
                                                        class="glyphicon glyphicon-log-out"></span> Logout</a>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span
                                                        class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modalRegister"><span
                                                        class="glyphicon glyphicon-pencil"></span> Register</a>
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header><?php }} ?>
