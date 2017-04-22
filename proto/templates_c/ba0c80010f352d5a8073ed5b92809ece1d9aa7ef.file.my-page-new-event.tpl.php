<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 16:54:27
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/event/my-page-new-event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125649351458f90fa5707fa0-85148768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba0c80010f352d5a8073ed5b92809ece1d9aa7ef' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/event/my-page-new-event.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125649351458f90fa5707fa0-85148768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f90fa571b3d6_24873973',
  'variables' => 
  array (
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f90fa571b3d6_24873973')) {function content_58f90fa571b3d6_24873973($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('common/aside-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Create new event</h1>
            </div>

            <form action="../../actions/event/new_event.php" method="post" enctype="multipart/>form-data">

                <div class="row">
                    <content class="col-md-8 col-xs-8">
                        <label class="special-label">Event Name *</label>
                        <input type="text" name="event-name" class="form-control" placeholder="Event Name"
                               aria-describedby="basic-addon1" required>
                    </content>
                    <content class="col-md-offset-1 col-md-1 col-xs-2">
                        <label>Public</label>
                        <input type="checkbox" class="checkbox-form" name="public">
                    </content>
                    <content class="col-md-offset-1 col-md-1 col-xs-2">
                        <label>Free</label>
                        <input type="checkbox" class="checkbox-form" name="free">
                    </content>
                </div>

                <div class="row">
                    <content class="col-xs-6">
                        <label>Date *</label>
                        <input type="date" id="datepicker" name="beginning-event-date" class="form-control"
                               placeholder="Date"
                               aria-describedby="basic-addon1" required>

                    </content>
                    <content class="col-xs-6">
                        <label>Time *</label>
                        <input type="time" name="beginning-event-time" class="form-control" placeholder="Time"
                               aria-describedby="basic-addon1" required>
                    </content>
                </div>

                <div class="row">
                    <content class="col-xs-6">
                        <label>Ending Date</label>
                        <input type="date" id="datepicker" name="ending-event-date" class="form-control"
                               placeholder="Date"
                               aria-describedby="basic-addon1" required>

                    </content>
                    <content class="col-xs-6">
                        <label>Ending Time</label>
                        <input type="time" name="ending-event-time" class="form-control" placeholder="Time"
                               aria-describedby="basic-addon1" required>
                    </content>
                </div>

                <div class="row">
                    <content class="col-xs-6">
                        <label>Recurrence *</label>
                        <select class="form-control" name="recurrence">
                            <option value="once">
                                Only Once
                            </option>
                            <option value="daily">
                                Daily
                            </option>
                            <option value="weekly">
                                Weekly
                            </option>
                            <option value="monthly">
                                Monthly
                            </option>
                            <option value="semester">
                                Semester
                            </option>
                            <option value="annually">
                                Annually
                            </option>
                        </select>
                    </content>

                    <content class="col-xs-6">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <option value="1">---</option>
                            <option value="2">Arts</option>
                            <option value="3">Business</option>
                            <option value="4">Charity</option>
                            <option value="5">Food & Drink</option>
                            <option value="6">Music</option>
                        </select>
                    </content>
                </div>

                <label>Description *</label>
                <textarea rows="4" cols="50" name="description" placeholder="Describe the event here"
                          class="form-control"
                          required=""></textarea>

                <div>
                    <label for="event-photo" class="btn btn-default">Upload photo</label>
                    <input id="event-photo" style="visibility:hidden;" name="event-photo" type="file">
                </div>

                <label>Local *</label>
                <input id="local-searchbox" name="local-searchbox" class="form-control" type="text"
                       placeholder="Search Location" aria-describedby="basic-addon1">

                <div id="map" style="width: 100%; height: 300px;"></div>

                <input type="text" name="lat" id="lat" hidden="true" required>
                <input type="text" name="lng" id="lng" hidden="true" required>
                <input type="text" name="city" id="city" hidden="true" required>
                <input type="text" name="country" id="country" hidden="true" required>

                <br></br>
                <button type="submit" class="btn btn-default btn-lg">Create event!</button>
                <br></br>

            </form>
        </content>
    </div>
</div>

<script type="text/javascript" src="../../scripts/map.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
