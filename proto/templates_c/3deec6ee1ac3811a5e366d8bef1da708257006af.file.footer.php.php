<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 15:22:02
         compiled from "/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/footer.php" */ ?>
<?php /*%%SmartyHeaderCode:95828742258f8b5fa981db9-43483442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3deec6ee1ac3811a5e366d8bef1da708257006af' => 
    array (
      0 => '/home/catarina/Desktop/FEUP/3ºano/LBAW/FEUP-LBAW/website/templates/common/footer.php',
      1 => 1492588420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95828742258f8b5fa981db9-43483442',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f8b5fa998180_88013864',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8b5fa998180_88013864')) {function content_58f8b5fa998180_88013864($_smarty_tpl) {?><footer class="container-fluid text-center" id="footer">
    <h5>LBAW 2016/17</h5>
</footer>

</div>
</body>

<!-- Modal Login -->
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
</div>

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

                <form id="teste" action="../../actions/authentication/register.php" method="post"
                      enctype="multipart/>form-data">

                    <label for="first_name">First Name</label>
                    <input name="first_name" id="first_name" type="text" class="form-control"
                           placeholder="Insert your first name" onkeyup="validateFirstName();" required>
                    <span id="confirmMessage1" class="confirmMessage1"></span>

                    <label>Last Name</label>
                    <input name="last_name" id="last_name" type="text" class="form-control"
                           placeholder="Insert your last name" required>

                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Choose an username" required>

                    <label>E-mail</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Insert your email"
                           required>

                    <label for="password">Password</label>
                    <input name="password" type="password" id="password" class="form-control"
                           placeholder="Choose a password between 8 and 25 characters" onkeyup="validatePassword();"
                           required>
                    <span id="confirmMessage" class="confirmMessage"></span>

                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm the password" required>
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
</div>

<!-- Modal Edit -->
<div id="modalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <div class="modal-body">
                <p>

                <form action="#" method="post" enctype="multipart/>form-data">

                    <label>First Name</label>
                    <input type="text" class="form-control" value="Rui" required>

                    <label>Last Name</label>
                    <input type="text" class="form-control" value="Paiva" required>

                    <label>Username</label>
                    <input type="text" class="form-control" value="ruivop" required>

                    <label>E-mail</label>
                    <input type="email" class="form-control" value="lalaland@lalaland.pt" required>

                </form>

                </p>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="../../scripts/authentication/validateRegister.js"></script>
<script src="../../scripts/classie.js"></script>
<script src="../../scripts/cbpAnimatedHeader.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

</html><?php }} ?>
