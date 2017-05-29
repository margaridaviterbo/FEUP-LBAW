<div>
    <span class="openbtn" onclick="openNav()"><span class="glyphicon glyphicon-align-justify"</span></span>
</div>


<div id="mySidenav" class="sidenav">

    <!--<div class="container-fluid text-left">-->
        <!--<div class="row">-->
            <!--<content class="col-lg-offset-10 col-lg-2 col-md-offset-9 col-md-3 col-sm-3 col-sm-offset-9">-->
                <div id="sidebar" class="well">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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

</div>





<script>
    /* Set the width of the side navigation to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>



<script>

    $(document).ready(function () {

        $('.sidebar-nav li a').click(function () {

            $('.sidebar-nav a').removeClass("selected");
            $(this).addClass("selected");
        });
    });



</script>