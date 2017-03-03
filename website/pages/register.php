<?php include('../templates/header.php'); ?>
<?php include('../templates/menu-visitor.php'); ?>

<div class="container-fluid text-left">

    <div class="page-title">
        <h1>Register</h1>
    </div>
    <div class="row">
            <div class="container-fluid col-sm-5">
                    <form action="upload.php" method="post" enctype="multipart/>form-data">
                        <p>First Name:</p>
                        <input type="text" class="form-control" placeholder="First Name" aria-describedby="basic-addon1">

                        <p class="tag-new-event-card">Last Name:</p>
                        <input type="text" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">

                        <p>Username:</p>
                        <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">

                        <p class="tag-new-event-card">E-mail:</p>
                        <input type="e-mail" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">

                        <p class="tag-new-event-card">E-mail:</p>
                        <input type="e-mail" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">

                        <p class="tag-new-event-card">Password:</p>
                        <input type="password" class="form-control" name="Password">

                        <p class="tag-new-event-card">Confirm Password:</p>
                        <input type="password" class="form-control" name="Password">

                        <p class="tag-new-event-card">Profile picture:</p>
                        <input type="file" name="User image" id="User image">

                        <input type="submit" class="form-control" value="Register">
                    </form>
            </div>
    </div>
</div>

<?php include('../templates/footer.php'); ?>
