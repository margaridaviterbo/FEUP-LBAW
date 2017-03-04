<?php include('../templates/header.php'); ?>
<?php include('../templates/menu-visitor.php'); ?>

<div class="container page">

    <div class="page-header">
        <h1>Login</h1>
    </div>

    <form action="#" method="post">

        <label>Username / E-mail</label>
        <input type="text" class="form-control" placeholder="Choose an username" required>

        <label>Password</label>
        <input type="password" class="form-control" placeholder="Choose a password" required>
        <span class="psw">Forgot <a href="#">password?</a></span>
        <br></br>

        <input type="checkbox" >Remember me<br></br>

        <button type="submit" class="btn btn-default btn-lg">Login</button>
        <br></br>

    </form>

    <label>Don't hava an account?<a href="./register.php"> Register</a> here.</label>

</div>

<?php include('../templates/footer.php'); ?>