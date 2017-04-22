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