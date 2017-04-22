<?php /* Smarty version Smarty-3.1.15, created on 2017-04-21 20:51:28
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/ticket/checkout-payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171781719858fa54b0a35134-67091421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9676ce3caf94898d0136b6c0f0445348457be53d' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/ticket/checkout-payment.tpl',
      1 => 1492800674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171781719858fa54b0a35134-67091421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa54b0a491e0_40028117',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa54b0a491e0_40028117')) {function content_58fa54b0a491e0_40028117($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('common/aside-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                  <h1> Checkout Infomation</h1>
                </div>
                    <div class="row ckeckout-card">
                        <div class="col-sm-12 tags-personal-card">
                            <div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Nome:</p><p id="nome">Rui Paiva</p>
                                <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Morada:</p>  <p id="morada">Rua das Flores, Porto, Portugal</p>
                                <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Event:</p>    <p id="evento">Evento1</p>
                            </div>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                              Type of ticket
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="#">Type 0</a>
                              </li>
                              <li>
                                <a href="#">Type 1</a>
                              </li>
                              <li>
                                <a href="#">Type 2</a>
                              </li>
                              <li>
                                <a href="#">Type 3</a>
                              </li>
                            </ul>
                          </div>
                          <div class="content-ckeckout">
                            <p class="tag-ckeckout-card">Custo:</p>
                            <p id="custo">10€</p>
                          </div>
                          <a href="confirmation-payment.php">
                            <button class="btn btn-default btn-primary form-control">Pay with paypal</button>
                          </a>
                    </div>
                </div>
            </content>
    </div>
      </div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
