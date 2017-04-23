<?php /* Smarty version Smarty-3.1.15, created on 2017-04-22 16:53:31
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/authentication/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190904049058f8d8fa2dfdf7-79602506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47735e0f38b332367b411ac703ade8f54c415e4e' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/authentication/login.tpl',
      1 => 1492872805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190904049058f8d8fa2dfdf7-79602506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f8d8fa2e0652_75856088',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8d8fa2e0652_75856088')) {function content_58f8d8fa2e0652_75856088($_smarty_tpl) {?><!-- Modal Login -->
<div id="modalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <p>

                <form action="../../actions/authentication/login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address / Username</label>
                        <input type="text" name="email-login" class="form-control" id="email-login"
                               placeholder="Insert email or username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password-login" class="form-control" id="password-login"
                               placeholder="Insert password"
                               required>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Login</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </form>

                </p>
                <span>Don't have an account?<a href="#" data-toggle="modal" data-dismiss="modal"
                                               data-target="#modalRegister"> Register</a> here.</span>
            </div>

        </div>
    </div>
</div><?php }} ?>
