<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 16:54:29
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/user/my-page-notifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4261282158fa29ec8f3d71-53484270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aab71fb8a78306d5dcd6068e5f7cf3b714dfeeb' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/user/my-page-notifications.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4261282158fa29ec8f3d71-53484270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa29ec9050b2_43054355',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa29ec9050b2_43054355')) {function content_58fa29ec9050b2_43054355($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/aside-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Notifications</h1>
                </div>
                <div class="notification-card-medium">
                    <p class="notification-date">Quinta, 19 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        The user <a href="#">user1</a> invited to an event called <a href="#">Festa da faculdade</a> on March 9, 2017 19:45 to 23, at <a href="#">piolho</a>.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>
                <div class="notification-card-medium">
                    <p class="notification-date">Quinta, 8 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        The user <a href="#">user1</a> commented on the event <a href="#">Festa da maternidade</a>.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>
                <div class="notification-card-medium">
                    <p class="notification-date">Quinta, 17 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        The user <a href="#">user1</a> chaged the name of the event "Festa da maternidade" for <a href="#">Festa da Paternidade</a>.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>
                <div class="notification-card-medium">
                    <p class="notification-date">Quinta, 16 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        The user <a href="#">user1</a> chaged the location of the event <a href="#">Festa da maternidade</a> for <a>Sé so Porto</a>.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>
                <div class="notification-card-medium">
                    <p class="notification-date">Quinta, 11 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        There was a deletion a commet that you did on the event <a href="#">Festa da maternidade</a>.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>
                <div class="container-fluid notification-card-medium">
                    <p class="notification-date">Quinta, 11 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        There was a deletion a commet that you did on the event <a href="#">Festa da maternidade</a>.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>

                <div class="notification-card-medium">
                    <p class="notification-date">Quinta, 11 de Março de 2017 às 19:45</p>
                    <p class="notification-content">
                        All the tickets for <a href="#">Festa da marta</a> were alredy sold.
                    </p>
                  <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                </div>

            </content>
        </div>
    </div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
