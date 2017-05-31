{include file='common/header.tpl'}
{include file='admin/menu-admin.tpl'}


<div class="admin">
    <div class="container-fluid text-left">

        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Admin Log In</h1>
                </div>
			<form action="../../actions/authentication/login-admin.php" method="post">
			  <div class="container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit">Login</button>
			  </div>
			</form>

            </content>
        </div>
    </div>
</div>


{include file='common/footer.tpl'}