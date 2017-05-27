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

                {foreach from=$comments item=cmt}
                    <div class="row">
                        <div class="col-sm-2 hidden-xs">
                            <div class="thumbnail">
                                <img class="img-responsive user-photo" src="{$BASE_URL}resources/images/user.png">
                            </div>
                        </div>

                        <div class="col-sm-10 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>{$cmt.user_id}</strong> <span class="text-muted">{$cmt.comment_date}</span>
                                </div>
                                <div class="panel-body">
                                    {$cmt.content}
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}


                <div class="row">

                    <div class="col-sm-2 hidden-xs">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo" src="{$BASE_URL}resources/images/user.png">
                        </div>
                    </div>

                    <div class="col-sm-10">

                        <form id="comment-form" action="../../actions/event/new_comment.php" method="POST">

                       <textarea name="comment" id="comment" rows="10" cols="80">
                           Write a comment...
                       </textarea>

                            <!--<a onClick="CKupdate();$('#comment-form').ajaxSubmit();">Submit</a>-->

                            <input type="submit" class="btn btn-default" value="Comment"/>
                            <input type="hidden" name="id" value="{$event_id}"/>
                            <script>
                                CKEDITOR.replace('comment');
                                function CKupdate() {
                                    for (instance in CKEDITOR.instances)
                                        CKEDITOR.instances[instance].updateElement();
                                }
                            </script>
                        </form>
                    </div>
                </div>


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