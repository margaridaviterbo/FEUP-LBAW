<header>
    <nav class="navbar navbar-fixed-top text-center">
        <div class="container-fluid header cbp-af-header">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                        aria-expanded="false">

                    <span class="sr-only"></span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="hidden-sm hidden-md hidden-lg" id="title">
                    <a href="{$BASE_URL}index.php"><h2>Eventify</h2></a>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-3 hidden-xs">
                    <div id="title">
                        <a href="{$BASE_URL}index.php"><h2>Eventify</h2></a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="row">
                        <div class="collapse navbar-collapse" id="menu">
                            <div class="col-sm-5 search">
                                    <form class="navbar-form navbar-center search" role="search" action="{$BASE_URL}pages/common/search.php#eventosPesq" method="get">
                                        <div class="form-group input-group">
                                            <input type="text" class="search-query input-mysize" name="serched" placeholder="Search..." id="serch-input">
                                            <span class="input-group-btn">
                                                            <button class="btn btn-default" type="submit">
                                                              <span class="glyphicon glyphicon-search"></span>
                                                            </button>
                                                        </span>
                                        </div>
                                    </form>
                            </div>

                            <div class="col-sm-5 pull-right">
                                <ul class="nav navbar-nav navbar-right" id="login">

                                    {if $USERNAME}
                                        <li><a href="{$BASE_URL}pages/user/my-page-my-information.php"><span
                                                        class="glyphicon glyphicon-pencil"></span>{$USERNAME}
                                            </a>
                                        </li>
                                        <li><a href="{$BASE_URL}actions/authentication/logout.php"><span
                                                        class="glyphicon glyphicon-log-out"></span> Logout</a>
                                        </li>
                                    {else}
                                        <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span
                                                        class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modalRegister"><span
                                                        class="glyphicon glyphicon-pencil"></span> Register</a>
                                        </li>
                                    {/if}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>