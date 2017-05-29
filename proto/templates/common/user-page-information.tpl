{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Profile</h1>
            </div>
            <div class="row personal-card">
                <div class="col-sm-6 tags-personal-card">
                    <div class="content-personal">
                        <p class="tag-personal-card">Username:</p>
                        <p class="info" id="username">{$USERNAMER}</p>
                    </div>
                    <div class="content-personal">
                        <p class="tag-personal-card">Email:</p>
                        <p class="info" id="email">{$EMAIL}</p>
                    </div>
                    <div class="content-personal">
                        <p class="tag-personal-card">Name:</p>
                        <p class="info" id="nome-utilizador">{$FIRSTNAME} {$LASTNAME}</p>
                    </div>
                    {if $NIF != NULL}
                        <div class="content-personal">
                            <p class="tag-personal-card">NIF:</p>
                            <p class="info" id="nome-utilizador">{$NIF}</p>
                        </div>
                    {/if}
                    <div class="content-personal">
                        <p class="tag-personal-card">Password:</p>
                        <p class="info" id="password">********</p>
                    </div>
					{if $USERID != -1}
					<form action="../../actions/user/denunciate.php" method="post">
					<div class="buy-btn col-xs-offset-1 col-xs-4">
						<input type="hidden" name="user" value="{$ID}">
                        <button type="submit" class="btn btn-default">Report User</button>
                    </div>
					</form>
					{else}
					<form action="../../actions/user/eliminate.php" method="post">
					<div class="buy-btn col-xs-offset-1 col-xs-4">
						<input type="hidden" name="user" value="{$ID}">
                        <button type="submit" class="btn btn-default">Eliminar Utilizador</button>
                    </div>
					</form>					
					{/if}
                </div>

                <div class="col-sm-3 inoformation-personal-card">
                </div>
                <div class="col-sm-4 photo-personal-card">
                    {if $PHOTO_URL == NULL}
                        <img src="../../resources/images/user.png" class="img-responsive img-thumbnail">
                    {else}
                        <img src="../../resources/images/image.jpeg" class="img-responsive img-thumbnail">
                    {/if}
                </div>

                <div class="col-sm-1 inoformation-personal-card">
                </div>
            </div>
        </content>
    </div>
</div>

{include file='common/footer.tpl'}