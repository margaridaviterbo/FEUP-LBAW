<!DOCTYPE html>

<html>

    <head>

        <title>Eventify</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/reset.css">
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/style.css">
    </head>

    <body>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>

    <header>
        <div class="container-fluid text-center navbar-fixed-top" id="header">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Eventify</h2>
                </div>
                <div class="col-sm-6">
                    <form class="navbar-form navbar-center" role="search">
                        <div class="form-group input-group">
                            <input type="text" class="form-control" placeholder="Search Event...">
                            <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <ul class="nav navbar-nav navbar-right" id="login">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-sm-9">

            </content>

            <content class="col-sm-3">
                <div class="aside-user-buttons">
                    <div class="list-group">
                        <a href="#" class="btn list-group-item">My Events</a>
                        <a href="#" class="btn list-group-item">Events Atended</a>
                        <a href="#" class="btn list-group-item">Invitations</a>
                        <a href="#" class="btn list-group-item">Notifications</a>
                    </div>
                    <a href="#" class="btn btn-primary btn-lg">Create Event</a>
                </div>
            </content>
        </div>
    </div>