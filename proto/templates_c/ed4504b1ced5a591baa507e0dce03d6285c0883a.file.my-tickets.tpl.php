<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 16:54:28
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/user/my-tickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53042358fa29eee45bc8-46172135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed4504b1ced5a591baa507e0dce03d6285c0883a' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/user/my-tickets.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53042358fa29eee45bc8-46172135',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa29eee57ad3_14085497',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa29eee57ad3_14085497')) {function content_58fa29eee57ad3_14085497($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/aside-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
<div class="purchased-tickets">
  <h2>
    Purchased Tickets:
  </h2>

  <ul>
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            4/3/2017 <a href="#"> Event 1</a>
          </div>
          <button class="btn btn-default btn-primary col-sm-5">Download Ticket</button>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            4/3/2017 <a href="#"> Event 2</a>
          </div>
          <button class="btn btn-default btn-primary col-sm-5">Download Ticket</button>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            2/3/2017 <a href="#"> Event 3</a>
          </div>
          <button class="btn btn-default btn-primary col-sm-5">Download Ticket</button>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
