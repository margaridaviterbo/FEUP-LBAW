{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}

<div class="container-fluid event-main-page">

    <div class="col-lg-offset-3 col-lg-6 col-md-8 col-sm-9 col-md-offset-1 col-sm-offset-0">

        <div class="manage">
            <img src="{$BASE_URL}resources/images/sunset.jpg" alt="Event"/>
            <!--<a href="#">Manage</a>-->
        </div>

        <nav class="navbar navbar-slide">

            <div class="row">

                <div class="col-sm-9">
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="#">Overview</a></li>
                        <li><a href="#location">Location</a></li>
                        <li><a href="#comments">Comments</a></li>
                        <li><a href="#">Guests</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">

                    <select class="going-select" data-show-icon="true">
                        <option data-icon="glyphicon-heart">Not Going</option>
                        <option value="two">Going</option>

                    </select>
                </div>
            </div>
        </nav>

        <div class="event-information">

            <div class="row">
                <div class="col-xs-1">
                    <span class="event-month">{$month}</span>
                    <span class="event-day">{$day}</span>
                </div>

                <div class="col-sm-8 col-md-9">


                    <div class="event-name">
                        {$event.name}
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            Public
                            <span class="glyphicon glyphicon-one-fine-dot"></span>
                            {if $event.free}
                                Free
                            {else}
                                Paid
                            {/if}
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-md-2 text-center user-photo">

                    <button><img src="{$BASE_URL}resources/images/user.jpeg">{$USERNAME}</button>

                </div>

            </div>
        </div>

        <div class="event-info-date" align="left">
            <span class="glyphicon glyphicon-map-marker"></span> {$event.street}
            <p></p>
            <span class="glyphicon glyphicon-time"></span>{$date}
        </div>

        <div class="page-header">
            <h3>Description</h3>
        </div>

        <div class="event-description">
            {$event.description}
        </div>

        <div class="page-header">
            <h3>Location</h3>
        </div>
        <div id="location" class="map-section">

            <div id="map" style="width: 100%; height: 300px;">
                <input type="text" id="lat" value="{$event.latitude}" hidden/>
                <input type="text" id="lon" value="{$event.longitude}" hidden/>
            </div>
            <h4 class="text-center"> {$event.street} </h4>
        </div>

        <div class="page-header">
            <h3>Comments</h3>
        </div>

        <div class="event-comments" id="comments">

            <div class="comment">

                <div class="row">
                    <div class="col-xs-2 user-photo">
                        <img class="center-block" src="{$BASE_URL}resources/images/user.png">
                    </div>

                    <div class="col-xs-4 user-photo">
                        <strong>Awesome1</strong>
                        <p></p>
                        5 days ago
                    </div>

                    <div class="col-xs-2 col-xs-offset-2">
                        <button><span class="glyphicon glyphicon-share-alt"></span>Reply</button>
                    </div>

                    <div class="col-xs-2">
                        <button><span class="glyphicon glyphicon-flag"></span>Report</button>
                    </div>
                </div>
                <div class="panel-body">
                    On it differed repeated wandered required in. Then girl neat why yet knew rose spot.
                    Moreover property we he kindness greatest be oh striking laughter. In me he at collecting
                    affronting principles apartments. Has visitor law attacks pretend you calling own excited
                    painted. Contented attending smallness it oh ye unwilling. Turned favour man two but lovers.
                    Suffer should if waited common person little oh. Improved civility graceful sex few smallest
                    screened settling. Likely active her warmly has.
                </div>

            </div>

            <div class="comment">

                <div class="row">
                    <div class="col-xs-2 user-photo">
                        <img class="center-block" src="{$BASE_URL}resources/images/user.png">
                    </div>

                    <div class="col-xs-4 user-photo">
                        <strong>Awesome2</strong>
                        <p></p>
                        5 days ago
                    </div>

                    <div class="col-xs-2 col-xs-offset-2">
                        <button><span class="glyphicon glyphicon-share-alt"></span>Reply</button>
                    </div>

                    <div class="col-xs-2">
                        <button><span class="glyphicon glyphicon-flag"></span>Report</button>
                    </div>
                </div>
                <div class="panel-body">
                    On it differed repeated wandered required in. Then girl neat why yet knew rose spot.
                    Moreover property we he kindness greatest be oh striking laughter. In me he at collecting
                    affronting principles apartments. Has visitor law attacks pretend you calling own excited
                    painted. Contented attending smallness it oh ye unwilling. Turned favour man two but lovers.
                    Suffer should if waited common person little oh. Improved civility graceful sex few smallest
                    screened settling. Likely active her warmly has.
                </div>

            </div>

            <div class="comment">

                <div class="row">
                    <div class="col-xs-2 user-photo">
                        <img class="center-block" src="{$BASE_URL}resources/images/user.png">
                    </div>

                    <div class="col-xs-4 user-photo">
                        <strong>Awesome3</strong>
                        <p></p>
                        5 days ago
                    </div>

                    <div class="col-xs-2 col-xs-offset-2">
                        <button><span class="glyphicon glyphicon-share-alt"></span>Reply</button>
                    </div>

                    <div class="col-xs-2">
                        <button><span class="glyphicon glyphicon-flag"></span>Report</button>
                    </div>
                </div>
                <div class="panel-body">
                    On it differed repeated wandered required in. Then girl neat why yet knew rose spot.
                    Moreover property we he kindness greatest be oh striking laughter. In me he at collecting
                    affronting principles apartments. Has visitor law attacks pretend you calling own excited
                    painted. Contented attending smallness it oh ye unwilling. Turned favour man two but lovers.
                    Suffer should if waited common person little oh. Improved civility graceful sex few smallest
                    screened settling. Likely active her warmly has.

                </div>
            </div>

            {if $USERNAME}
                <div class="page-header">
                    <h3>Your Answer</h3>
                </div>
                <form id="comment-form" action="#">
                        <textarea name="editor" id="editor">
                        </textarea>
                    <script>
                        CKEDITOR.replace('editor');
                    </script>

                    <input id="submit_editor" type="submit" value="Submit">

                </form>
            {/if}
        </div>
    </div>
</div>


{include file='common/footer.tpl'}

<script>

    $(document).ready(function () {

        $('.navbar-nav li a').click(function () {

            $('.navbar-nav a').removeClass("active");
            $(this).addClass("active");
        });
    });


    $(document).ready(function () {

        $(window).scroll(function () {
            console.log($(window).scrollTop())
            if ($(window).scrollTop() > 480) {
                $('.navbar-slide').addClass('navbar-fixed-second-top');
            }
            if ($(window).scrollTop() <= 480) {
                $('.navbar-slide').removeClass('navbar-fixed-second-top');
            }
        });
    });

</script>


<script type="text/javascript" src="../../scripts/event/show-map-location.js"></script>