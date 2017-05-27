<!--<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-10 col-lg-2 col-md-offset-9 col-md-3   col-sm-3 col-sm-offset-9">
            <!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
            <!--<div id="sidebar" class="well sidebar-nav">
                <h5><i class="glyphicon glyphicon-home"></i>
                    <small><b>Events</b></small>
                </h5>
            <div class="aside-user-buttons">
                <div class="list-group">
                    <a href="{$BASE_URL}pages/user/user-homepage.php" class="list-group-item">Upcoming Events</a>
                    <a href="{$BASE_URL}pages/user/my-page-attended.php" class="list-group-item">Past Events</a>
                    <a href="{$BASE_URL}pages/user/my-page-my-events.php" class="list-group-item">My Events</a>
                    <a href="{$BASE_URL}pages/user/my-page-invitations.php" class="list-group-item">Invitations</a>
                    <a href="{$BASE_URL}pages/user/my-page-notifications.php" class="list-group-item">Notifications</a>
                    <a href="{$BASE_URL}pages/user/my-tickets.php" class="list-group-item">My Tickets</a>
                </div>
                <a href="{$BASE_URL}pages/event/my-page-new-event.php" class="btn btn-primary btn-lg">Create Event</a>
            </div>
        </content>
    </div>
</div>-->

<!-- TODO POR O MENU A DESAPARECER NA VERSAO MOBILE-->

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-10 col-lg-2 col-md-offset-9 col-md-3 col-sm-3 col-sm-offset-9">
            <div id="sidebar" class="well sidebar-nav">
                <h5><i class="glyphicon glyphicon-home"></i>
                    <small><b>Events</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a class="selected" href="{$BASE_URL}pages/user/user-homepage.php">Upcoming Events</a></li>
                    <li><a href="{$BASE_URL}pages/user/my-page-attended.php">Past Events</a></li>
                    <li><a href="{$BASE_URL}pages/user/my-page-my-events.php">My Events</a></li>
                    <li><a href="{$BASE_URL}pages/user/my-page-saved-events.php">Saved Events</a></li>
                </ul>
                <br><h5><i class="glyphicon glyphicon-user"></i>
                    <small><b>Activity</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{$BASE_URL}pages/user/my-page-invitations.php">Invitations</a></li>
                    <li><a href="{$BASE_URL}pages/user/my-page-notifications.php">Notifications</a></li>
                    <li><a href="{$BASE_URL}pages/user/my-tickets.php">My Tickets</a></li>
                </ul>
                <div id="createEventBtn">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{$BASE_URL}pages/event/my-page-new-event.php"> <span class="glyphicon glyphicon-plus"></span> Create Event</a></li>
                    </ul>
                </div>
            </div>
        </content>
    </div>
</div>

<script>

    $(document).ready(function () {

        $('.sidebar-nav li a').click(function () {

            $('.sidebar-nav a').removeClass("selected");
            $(this).addClass("selected");
        });
    });



</script>