{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}
<p hidden id="au_user_id">{$au_user_id}</p>
<p hidden id="this_event_id">{$event_id}</p>

<div class="container-fluid event-main-page">

    <div class="col-lg-offset-3 col-lg-6 col-md-8 col-sm-9 col-md-offset-1 col-sm-offset-0">

        <div class="manage">
            <img src="{$BASE_URL}resources/images/sunset.jpg" alt="Event"/>
            <!--<a href="#">Manage</a>-->
        </div>

        <nav class="navbar navbar-slide">

            <div class="row">

                <div class="col-xs-offset-1 col-xs-7 col-sm-offset-0 col-sm-9">
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="#">Overview</a></li>
                        <li><a href="#location">Location</a></li>
                        <li><a href="#comments">Comments</a></li>
                        <li><a href="#hosts">Hosts</a></li>
                        <li><a href="#guests">Guests</a></li>
                    </ul>
                </div>
                <div class="col-xs-3 col-sm-3">
                    {if $USERNAME && ($isGuest || $event.public)}
                        <select class="going-select" data-show-icon="true">
                            <option data-icon="glyphicon-heart" value="one" {if !$going}selected{/if}>Not Going</option>
                            <option value="two" {if $going}selected{/if}>Going</option>
                        </select>
                    {/if}
                </div>
            </div>
        </nav>

        <div class="event-information">

            <div class="row eve-info">
                <content class="col-xs-1">
                    <span class="event-month">{$month}</span>
                    <span class="event-day">{$day}</span>
                </content>

                <content class="col-xs-9 col-md-10">

                    <div class="row">

                        <div class="col-xs-5 event-name">
                            {$event.name}
                        </div>
                        <div class="col-xs-5">
                            <div class="row">

                                <div class="rating">

                                    <input type="radio" id="star5" name="rating" {if $rateUser == 10}checked{/if} value="10"/><label class="full"
                                                                                                    for="star5"></label>
                                    <input type="radio" id="star4half" name="rating" {if $rateUser == 9} checked {/if} value="9"/><label class="half"
                                                                                                       for="star4half"></label>
                                    <input type="radio" id="star4" name="rating" {if $rateUser == 8} checked {/if} value="8"/><label class="full"
                                                                                                   for="star4"></label>
                                    <input type="radio" id="star3half" name="rating" {if $rateUser == 7} checked {/if} value="7"/><label class="half"
                                                                                                       for="star3half"></label>
                                    <input type="radio" id="star3" name="rating" {if $rateUser == 6} checked {/if} value="6"/><label class="full"
                                                                                                   for="star3"></label>
                                    <input type="radio" id="star2half" name="rating" {if $rateUser == 5} checked {/if} value="5"/><label class="half"
                                                                                                       for="star2half"></label>
                                    <input type="radio" id="star2" name="rating" {if $rateUser == 4} checked {/if} value="4"/><label class="full"
                                                                                                   for="star2"></label>
                                    <input type="radio" id="star1half" name="rating" {if $rateUser == 3} checked {/if} value="3"/><label class="half"
                                                                                                       for="star1half"></label>
                                    <input type="radio" id="star1" name="rating" {if $rateUser == 2} checked {/if} value="2"/><label class="full"
                                                                                                   for="star1"></label>
                                    <input type="radio" id="starhalf" name="rating" {if $rateUser == 1} checked {/if} value="1"/><label class="half"
                                                                                                      for="starhalf"></label>
                                </div>
                            </div>
                            (Rate: {$rate})
                        </div>

                        <content class="col-xs-2 col-md-2 text-center user-photo">

                            <button><img src="{$BASE_URL}resources/images/user.jpeg">{$owner}</button>

                        </content>

                    </div>

                    <div class="row">
                        <content class="col-xs-4">
                            {if $event.public}
                                Public
                            {else}
                                Private
                            {/if} <span class="glyphicon glyphicon-one-fine-dot"></span>
                            {if $event.free}
                                Free
                            {else}
                                Paid
                            {/if}
                        </content>

                        {if !$event.free && ($isGuest || $event.public)}
                            <div class="buy-btn col-xs-offset-1 col-xs-4">
                                <a href="../ticket/checkout-payment.php?id={$event_id}" class="btn btn-default">Buy
                                    Ticket</a>
                            </div>
                        {/if}
                    </div>
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

        <div class="event-description" style="text-align: justify">
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

                        {if $cmt.username == $USERNAME}
                            <div class="col-xs-offset-4 col-xs-2">
                                <button class="remove" value="{$cmt.comment_id}"><span
                                            class="glyphicon glyphicon-remove"></span>Delete
                                </button>
                            </div>
                        {else}
                            <div class="col-xs-2 col-xs-offset-2">
                                <button><span class="glyphicon glyphicon-share-alt"></span>Reply</button>
                            </div>
                            <div class="col-xs-2">
                                <button><span class="glyphicon glyphicon-flag"></span>Report</button>
                            </div>
                        {/if}
                    </div>
                    <div class="col-xs-12">
                        <div class="panel-body">
                            {$cmt.content}
                        </div>
                    </div>
                </div>
            {/foreach}


            {if $USERNAME}
                <div class="page-header">
                    <h3>Your Answer</h3>
                </div>
                <form id="comment-form" method="post" action="{$BASE_URL}actions/event/new_comment.php">
                    <input type="text" name="user_id" id="user_id" hidden="true" value="{$USERID}">
                    <input type="text" name="event_id" id="event_id" hidden="true" value="{$event_id}">
                    <textarea name="editor" id="editor">
                        </textarea>
                    <script>
                        CKEDITOR.replace('editor');
                    </script>
                    <div class="submit-btn col-xs-1">
                        <input id="submit_editor" type="submit" value="Submit" class="form-control">
                    </div>
                </form>
            {/if}
        </div>

        <div class="row">
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
        </div>
        <div class="row">

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

        <div class="row">

            <div class="page-header">
                <div class="row">
                    <content class="col-xs-9">
                        <h3 style="margin: 0px;">Guests</h3>
                    </content>
                    <content class="col-xs-3">
                        {foreach $hosts as $host}
                            {if $host.username == $USERNAME}
                                <input id="search-guest" type="search" class="form-control" placeholder="Add guests..."
                                       autocomplete="off"/>
                                <div class="content-list" id="search-list-guest" style="width: 100%;">
                                    <ul class="drop-list-guest">

                                    </ul>
                                </div>
                            {/if}
                        {/foreach}
                    </content>
                </div>
            </div>
        </div>

        <div></div>


        <div id="guests">

            {for $i = 0; $i < count($guests); $i++}

                {if $i == 0}
                    <content class="col-xs-1">
                        <div class="user-photo">
                            <button><img src="{$BASE_URL}resources/images/user.jpeg">{$guests[$i].username}</button>
                        </div>
                    </content>
                {else}
                    <content class="col-xs-1 col-xs-offset-1">
                        <div class="user-photo">
                            <button><img src="{$BASE_URL}resources/images/user.jpeg">{$guests[$i].username}</button>
                        </div>
                    </content>
                {/if}
            {/for}
        </div>
    </div>
</div>

{include file='common/footer.tpl'}

<script src="{$BASE_URL}scripts/search/show-event-script.js"></script>
<script src="{$BASE_URL}scripts/event/response-event.js"></script>
<script type="text/javascript" src="../../scripts/event/show-map-location.js"></script>