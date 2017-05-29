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
                        <li><a href="#">Hosts</a></li>
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
                <content class="col-xs-1">
                    <span class="event-month">{$month}</span>
                    <span class="event-day">{$day}</span>
                </content>

                <content class="col-sm-8 col-md-9">

                    <div class="event-name">
                        {$event.name}
                    </div>
                    <div class="row">
                        <content class="col-xs-4">
                            Public
                            <span class="glyphicon glyphicon-one-fine-dot"></span>
                            {if $event.free}
                                Free
                            {else}
                                Paid
                            {/if}
                        </content>
                        <div class="col-xs-1">
                            <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                <input id="rate" type="hidden" name="rating"/>
                                <input type="hidden" name="id" value="{$event_id}"/>
                            </form>

                            <script type="text/javascript">
                                function rate(val) {
                                    $("#rate").val(val);
                                    $("#rform").submit();
                                }
                            </script>
                        </div>

                        <div class="event-rate">

                            {for $i=1 to $rate}
                                <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                            {/for}
                            {for $i=$rate+1 to 5}
                                <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                            {/for}
                        </div>
                    </div>
                </content>

                <content class="col-sm-3 col-md-2 text-center user-photo">

                    <button><img src="{$BASE_URL}resources/images/user.jpeg">{$USERNAME}</button>

                </content>

            </div>
        </div>

        <div class="event-info-date" align="left">
            <span class="glyphicon glyphicon-map-marker"></span> {$event.street}
            <p></p>
            <span class="glyphicon glyphicon-time"></span>{$date}
        </div>

        <!--<div>
                <form id="comment-form" action="../../actions/event/save_event.php" method="POST" class="form-inline">
                    <input type="hidden" name="id" value="{$event_id}" />
                    <input type="submit" value="Save" class="btn btn-default form-control"/>
                </form>

                <a href="edit-event.php?id={$event_id}" class="btn btn-default">Edit</a>
                <form class="form-inline">
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=large&mobile_iframe=true&width=73&height=28&appId" width="73" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </form>
            </div>-->

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

            {if count($comments) == 0}
                <h4>No comments yet.</h4>
            {/if}

            {foreach $comments as $cmt}
                <div class="comment">

                    <div class="row">
                        <div class="col-xs-2 user-photo">
                            <img class="center-block" src="{$BASE_URL}resources/images/user.png">
                        </div>

                        <div class="col-xs-4 user-photo">
                            <strong>{$cmt.username}</strong>
                            <p></p>
                            {$cmt.comment_date}
                        </div>

                        <div class="col-xs-2 col-xs-offset-2">
                            <button><span class="glyphicon glyphicon-share-alt"></span>Reply</button>
                        </div>

                        <div class="col-xs-2">
                            <button><span class="glyphicon glyphicon-flag"></span>Report</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        {$cmt.content}
                    </div>
                </div>
            {/foreach}


            {if $USERNAME}
                <div class="page-header">
                    <h3>Your Answer</h3>
                </div>
                <form id="comment-form" method="post" action="{$BASE_URL}actions/event/new_comment.php">
                    <input type="text" name="user_id" hidden="true" value="{$USERID}">
                    <input type="text" name="event_id" id="event_id" hidden="true" value="{$event_id}">
                    <textarea name="editor" id="editor">
                        </textarea>
                    <script>
                        CKEDITOR.replace('editor');
                    </script>

                    <input id="submit_editor" type="submit" value="Submit">

                </form>
            {/if}
        </div>


        <div class="page-header">
            <div class="row">
                <content class="col-xs-9">
                    <h3 style="margin: 0px;">Hosts</h3>
                </content>
                <content class="col-xs-3">
                    {foreach $hosts as $host}
                        {if $host.username == $USERNAME}
                            <input id="search-user" type="search" class="form-control" placeholder="Add hosts..."
                                       autocomplete="off"/>
                            <div class="content-list" id="search-list" style="width: 100%;">
                                <ul class="drop-list">

                                </ul>
                            </div>
                        {/if}
                    {/foreach}
                </content>
            </div>
        </div>

        <div id="hosts">

            {for $i = 0; $i < count($hosts); $i++}

                {if $i == 0}
                    <content class="col-xs-1">
                        <div class="user-photo">
                            <button><img src="{$BASE_URL}resources/images/user.jpeg">{$hosts[$i].username}</button>
                        </div>
                    </content>
                {else}
                    <content class="col-xs-1 col-xs-offset-1">
                        <div class="user-photo">
                            <button><img src="{$BASE_URL}resources/images/user.jpeg">{$hosts[$i].username}</button>
                        </div>
                    </content>
                {/if}
            {/for}
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


<script src="{$BASE_URL}scripts/search/show-event-search.js"></script>
<script type="text/javascript" src="../../scripts/event/show-map-location.js"></script>