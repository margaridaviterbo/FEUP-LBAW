<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 17:00:13
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174807675958f9038048c9f4-69254938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3670cfd8a5eee9891c3f9df0b789279443a83ea8' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/error.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174807675958f9038048c9f4-69254938',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f903804af173_06120020',
  'variables' => 
  array (
    'ERROR_MESSAGES' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f903804af173_06120020')) {function content_58f903804af173_06120020($_smarty_tpl) {?><div class="container-fluid text-left">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
        <div class="page-title">
            <h1>ERROR</h1>
        </div>
        <div class="page">
            <h1><?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value;?>
. Redirecting...</h1>
        </div>
        </div>
    </div>

</div><?php }} ?>
