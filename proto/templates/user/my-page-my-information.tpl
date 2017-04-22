{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>My information</h1>
            </div>
            <div class="row personal-card">
                <div class="col-sm-4 tags-personal-card">
                    <div class="content-personal">
                        <p class="tag-personal-card">Username:</p>
                        <p id="username">{$USERNAME}</p>
                        <a href="#">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="content-personal">
                        <p class="tag-personal-card">Email:</p>
                        <p id="email">{$EMAIL}</p>
                        <a href="#">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="content-personal">
                        <p class="tag-personal-card">Name:</p>
                        <p id="nome-utilizador">{$FIRSTNAME} {$LASTNAME}</p>
                        <a href="#">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </div>
                    {if $NIF != NULL}
                        <div class="content-personal">
                            <p class="tag-personal-card">NIF:</p>
                            <p id="nome-utilizador">{$NIF}</p>
                            <a href="#">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    {/if}
                    <div class="content-personal">
                        <p class="tag-personal-card">Password:</p>
                        <p id="password">********</p>
                        <a href="#">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-3 inoformation-personal-card">
                </div>
                <div class="col-sm-4 photo-personal-card">
                    {if $PHOTO_URL == NULL}
                        <img src="../../resources/images/user.png" class="img-responsive img-thumbnail">
                    {else}
                        <img src="../../resources/images/image.jpeg" class="img-responsive img-thumbnail">
                    {/if}
                    <div>
                        <label for="files" class="btn btn-default">Upload photo</label>
                        <input id="files" style="visibility:hidden;" type="file">
                    </div>
                </div>

                <div class="col-sm-1 inoformation-personal-card">
                </div>
            </div>
        </content>
    </div>

{include file='common/footer.tpl'}