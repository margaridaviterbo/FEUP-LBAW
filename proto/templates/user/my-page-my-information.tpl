{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>My Profile</h1>
            </div>

            <form action="{$BASE_URL}actions/user/updateUser.php" method="post"
                  enctype="multipart/>form-data">
                <div class="row personal-card">

                    <div class="col-sm-8">

                        <label>First Name *</label>
                        <input name="first_name" type="text" class="form-control first_name"
                               placeholder="Insert your first name" value="{$FIRSTNAME}" onkeyup="validateFirstName();"
                               required>

                        <label>Last Name *</label>
                        <input name="last_name" type="text" class="form-control last_name"
                               placeholder="Insert your last name" value="{$LASTNAME}" onkeyup="validateLastName();"
                               required>

                        <label>Username * <span class="username-erro-label"></span></label>
                        <input name="username" type="text" class="form-control username" value="{$USERNAME}"
                               onkeyup="validateUsername();" placeholder="Choose an username" required>

                        <label>E-mail *<span class="email-erro-label"></span></label>
                        <input name="email" type="email" class="form-control email" placeholder="Insert your email"
                               value="{$EMAIL}" onkeyup="validateEmail();"
                               required>

                        <label>NIF<span class="nif-erro-label"></span></label>
                        <input name="nif" type="number" class="form-control nif" placeholder="Insert your nif"
                               value="{$NIF}" onkeyup="validateNif();">
                        <span class="nif_message"></span>

                        <label for="password">Password *<span class="password_message"></span></label>
                        <input name="password" type="password" class="form-control password"
                               placeholder="Choose a password between 8 and 25 characters"
                               onkeyup="validatePassword();">

                        <label>Confirm Password *<span class="confirm_password_message"></span></label>
                        <input type="password" class="form-control confirm_password" placeholder="Confirm the password"
                               onkeyup="confirmPassword();">
                        <br></br>

                        <button type="submit" class="btn btn-primary form-control" onclick="return validateAll();">Edit

                    </div>

                    <div class="col-sm-4 photo-personal-card">
                            <img src="{$PHOTOURL}" class="img-responsive img-thumbnail" name="photo_url" style="height: 300px; overflow:hidden">
                        <div>
                            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                            <label for="fileToUpload" class="btn btn-default">Upload photo</label>
                            <input id="fileToUpload" name="fileToUpload" style="visibility:hidden;"type="file" accept="image/*">
                        </div>
                    </div>

                </div>

            </form>
        </content>
    </div>
</div>

{include file='common/footer.tpl'}

<script src="{$BASE_URL}scripts/user/validateUpdateUser.js"></script>