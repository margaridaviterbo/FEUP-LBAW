<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 16:54:30
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/event/show-all-events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11555479858fa622b69b728-18918167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '580f3e7e96c0da4d5e638d5d10baa7e22a18573b' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/event/show-all-events.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11555479858fa622b69b728-18918167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa622b745f47_51186986',
  'variables' => 
  array (
    'USERNAME' => 0,
    'events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa622b745f47_51186986')) {function content_58fa622b745f47_51186986($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('common/aside-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Events that I created</h1>
                </div>

                <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
                    <div class="container-fluid event-card-medium">
                        <p class="titulo-card"><?php echo $_smarty_tpl->tpl_vars['event']->value['name'];?>
</p>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="../../resources/images/2.jpg" />
                            </div>
                            <div class="col-sm-9">
                                <p class="text-card"> Dia da semana, <?php echo $_smarty_tpl->tpl_vars['event']->value['beginning_date'];?>
 às horas</p>
                                <p class="text-card">ISG<p>
                                <?php if ($_smarty_tpl->tpl_vars['event']->value['free']) {?>
                                    <p class="text-card">Gratuito</p>
                                <?php } else { ?>
                                    <p class="text-card">Pago</p>
                                <?php }?>
                                <div class="container-fluid">
                                    <div class="row">

                                        <button onclick="window.location.href='../event/show-event-page.php'" type="button" class="btn btn-default col-sm-5">See Event</button>
                                        <button onclick="window.location.href='../event/my-page-edit-event.php'" type="button" class="btn btn-default col-sm-5">Edit Event</button>

                                        <div class="classifica-card col-sm-7">
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </content>
        </div>
    </div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
