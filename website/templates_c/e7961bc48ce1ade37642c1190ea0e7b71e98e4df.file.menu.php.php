<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 15:20:32
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/menu.php" */ ?>
<?php /*%%SmartyHeaderCode:19678047958f8b5a0ecf811-63751765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7961bc48ce1ade37642c1190ea0e7b71e98e4df' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/menu.php',
      1 => 1492448435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19678047958f8b5a0ecf811-63751765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f8b5a0ee0d22_07080070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8b5a0ee0d22_07080070')) {function content_58f8b5a0ee0d22_07080070($_smarty_tpl) {?><header>
    <div class="container">

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
                        <a href="../../index.php"><h2>Eventify</h2></a>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3 hidden-xs">
                        <div id="title">
                            <a href="../../index.php"><h2>Eventify</h2></a>
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

                                        <<?php ?>?php
                                        if (isset($_SESSION['authenticated'])) {
                                            if ($_SESSION['authenticated'] == true) {
                                                ?<?php ?>>

                                                <li><a href="../../pages/user/my-page-my-information.php"><span
                                                                class="glyphicon glyphicon-pencil"></span><<?php ?>?= $_SESSION['username'] ?<?php ?>>
                                                    </a>
                                                </li>
                                                <li><a href="../../actions/authentication/logout.php"><span
                                                                class="glyphicon glyphicon-log-out"></span> Logout</a>
                                                </li>

                                                <<?php ?>?php
                                            }
                                        } else {
                                            ?<?php ?>>

                                            <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span
                                                            class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#modalRegister"><span
                                                            class="glyphicon glyphicon-pencil"></span> Register</a>
                                            </li>1

                                            <<?php ?>?php
                                        }
                                        ?<?php ?>>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</header><?php }} ?>
