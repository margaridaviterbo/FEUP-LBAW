<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 17:52:14
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/authentication/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124944227158f8d92e443848-06202155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b51962d0cc2173d338ac3f74a5ddd072ec053a76' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/authentication/register.tpl',
      1 => 1492703528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124944227158f8d92e443848-06202155',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f8d92e4444d5_44680002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8d92e4444d5_44680002')) {function content_58f8d92e4444d5_44680002($_smarty_tpl) {?>
<!-- Modal Register -->
<div id="modalRegister" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body">
                <p>

                <form id="teste" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/authentication/register.php" method="post"
                      enctype="multipart/>form-data">

                    <label for="first_name">First Name </label>
                    <input name="first_name" id="first_name" type="text" class="form-control"
                           placeholder="Insert your first name" onkeyup="validateFirstName();" required>
                    <span class="name_message"></span>

                    <label>Last Name</label>
                    <input name="last_name" id="last_name" type="text" class="form-control"
                           placeholder="Insert your last name" required>
                    <span class="name_message"></span>

                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Choose an username" required>
                    <span class="username_message"></span>

                    <label>E-mail</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Insert your email"
                           required>
                    <span class="email_message"></span>

                    <label for="password">Password</label>
                    <input name="password" type="password" id="password" class="form-control"
                           placeholder="Choose a password between 8 and 25 characters" onkeyup="validatePassword();"
                           required>
                    <span class="password_message"></span>

                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm the password" required>
                    <span class="confirm_password_message"></span>
                    <br></br>

                    <label>Profile picture</label>
                    <div>
                        <label for="profile-photo" class="btn btn-default">Upload photo</label>
                        <input id="profile-photo" style="visibility:hidden;" type="file">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" onclick="return validateFirstName()">Register
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </form>

                </p>
                <span>Already have an account?<a href="#" data-toggle="modal" data-dismiss="modal"
                                                 data-target="#modalLogin"> Log in</a> here.</span>
            </div>

        </div>

    </div>
</div><?php }} ?>
