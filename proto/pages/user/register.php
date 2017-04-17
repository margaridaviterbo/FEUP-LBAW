<?php include_once('../../config/init.php'); ?>
<?php include($HEADER_DIR); ?>
<?php include($MENU_USER_DIR); ?>
<?php include($ASSIDE_MENU_DIR); ?>

<div class="container page">

    <div class="page-header">
        <h1>Register</h1>
    </div>

    <form action="#" method="post" enctype="multipart/>form-data">

        <label>First Name</label>
        <input type="text" class="form-control" placeholder="Insert your first name" required>

        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Insert your last name" required>

        <label>Username</label>
        <input type="text" class="form-control" placeholder="Choose an username" required>

        <label>E-mail</label>
        <input type="email" class="form-control" placeholder="Insert your email" required>

        <label>Password</label>
        <input type="password" class="form-control" placeholder="Choose a password" required>

        <label>Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm the password" required>
        <br></br>

        <label>Profile picture</label>
        <input type="file" name="User image" id="User image">

        <br></br>
        <button type="submit" class="btn btn-default btn-lg">Register</button>
        <br></br>

    </form>

    <label>Already have an account?<a href="#" data-toggle="modal" data-target="#modalLogin"> Log in</a> here.</label>
</div>

<?php include($FOTTER_DIR); ?>
