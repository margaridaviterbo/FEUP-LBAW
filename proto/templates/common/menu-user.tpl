<header>
    <div class="container">

        <nav class="navbar navbar-fixed-top text-center">
            <div class="container-fluid header cbp-af-header">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">

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
                                    <form class="navbar-form navbar-center" role="search" action="{$BASE_URL}pages/user/search.php#eventosPesq" method="get">
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="serched" placeholder="Search Event..." id="serch-input">
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
                                        
                                        <li><a href="{$BASE_URL}pages/user/my-page-my-information.php"><span class="glyphicon glyphicon-pencil"></span> Rui Paiva</a></li>
                                        <li><a href="{$BASE_URL}index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</header>