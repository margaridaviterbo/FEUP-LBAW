<?php /* Smarty version Smarty-3.1.15, created on 2017-04-21 21:37:33
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/event/show-event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130528014558fa5f651da946-90079786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '244793e8f30e6d40fb3a76b99eb921a4907c8695' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/event/show-event.tpl',
      1 => 1492803447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130528014558fa5f651da946-90079786',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa5f652e6db3_35311267',
  'variables' => 
  array (
    'BEGINNINGDATE' => 0,
    'ENDINGDATE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa5f652e6db3_35311267')) {function content_58fa5f652e6db3_35311267($_smarty_tpl) {?><div class="row event-page-header">

    <div class="col-lg-6 col-lg-offset-2 col-md-6 col-md-offset-1 hidden-sm hidden-xs event-page-image-section white-page">
        <img src="../../resources/images/1.jpg" alt="Event" class="event-page-photo img-responsive "/>
    </div>

    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs event-page-info-square-section">
        <div class="event-date">
            <?php echo $_smarty_tpl->tpl_vars['BEGINNINGDATE']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['ENDINGDATE']->value;?>

        </div>

        <div class="event-name">
            <strong>Sessão de Demonstração para o Desenvolvimento em Comunicação</strong>
        </div>

        <div class="event-creator">
            created by ...
        </div>

        <div class="event-rate">
            Rate:
            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
        </div>

        <div class="event-price">
            13 - 20€
        </div>
    </div>

</div><?php }} ?>
