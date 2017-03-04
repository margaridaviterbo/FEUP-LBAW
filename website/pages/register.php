<?php include('../templates/header.php'); ?>
<?php include('../templates/menu-visitor.php'); ?>

<div class="container page">

    <div class="page-header">
        <h1>Register</h1>
    </div>

    <form action="#" method="post" enctype="multipart/>form-data">

        <label>First Name</label>
        <input type="text" class="form-control" placeholder="Insert your first name">

        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Insert your last name">

        <label>Username</label>
        <input type="text" class="form-control" placeholder="Choose an username">

        <label>E-mail</label>
        <input type="email" class="form-control" placeholder="Insert your email">

        <label>Password</label>
        <input type="password" class="form-control" placeholder="Choose a password">

        <label>Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm the password">
        <br></br>

        <label>Profile picture</label>
        <input type="file" name="User image" id="User image">

        <br></br>
        <button type="submit" class="btn btn-default btn-lg">Register</button>
        <br></br>

    </form>

    <label>Already have an account?<a href="#"> Log in</a> here.</label>
</div>

<?php include('../templates/footer.php'); ?>