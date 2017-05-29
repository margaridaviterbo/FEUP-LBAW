<div class="header">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#menu" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{$BASE_URL}index.php">Eventify</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
                <div class="nav navbar-nav test">

                    <div class="col-lg-offset-3 col-md-offset-2 col-xs-11">
                        <form class="navbar-form search" name="form" role="search"
                              action="{$BASE_URL}pages/common/search.php#eventosPesq" method="get">

                            <div class="search-div">
                                <input id="search" type="search" name="serched" class="form-control search-query"
                                       Placeholder="Search..." autocomplete="true" id="serch-input"/>
                                <span data-icon="&#xe000;" aria-hidden="true" class="search-btn">
                                    <input type="submit" class="searchsubmit" id="search-button" value="">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="login-div">
                    <ul class="nav navbar-nav navbar-right text-center" id="login">

                        {if $USERNAME}
							{if $USERID != -1}
                            <li><a href="{$BASE_URL}pages/user/my-page-my-information.php"><span
                                            class="glyphicon glyphicon-pencil"></span>{$USERNAME}
                                </a>
                            </li>
							{/if}
                            <li><a href="{$BASE_URL}actions/authentication/logout.php"><span
                                            class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li>
                        {else}
                            <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span
                                            class="glyphicon glyphicon-log-in"></span>Login</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modalRegister"><span
                                            class="glyphicon glyphicon-pencil"></span>Register</a>
                            </li>
                        {/if}
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>