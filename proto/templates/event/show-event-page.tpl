{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}

<div class="container-fluid">

    <div class="row event-page-header">
        <div class="col-lg-offset-3 col-lg-4 col-md-6 col-md-offset-1 hidden-sm hidden-xs event-page-image-section white-page">
            <img src="{$BASE_URL}resources/images/1.jpg" alt="Event" class="event-page-photo img-responsive "/>
        </div>

        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs event-page-info-square-section">
            <div class="event-date">
                {$date}
            </div>

            <div class="event-name">
                <strong>{$event.name}</strong>
            </div>

            <div class="event-rate">
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
            </div>

            <div class="event-creator">
                created by <strong>{$event.username}</strong>
            </div>

            <div class="event-price">
                {if $event.free}
                    <p class="text-card">Free</p>
                {else}
                    <p class="text-card">Paid</p>
                {/if}
            </div>
        </div>

    </div>

    <div class="row event-page-header-small">

        <div class="col-sm-8 col-sm-offset-1 col-xs-12 hidden-lg hidden-md event-page-image-section white-page">
            <img src="{$BASE_URL}resources/images/1.jpg" alt="Event" class="event-page-photo img-responsive "/>
        </div>
    </div>

    <div class="row event-page-header-small">

        <div class="col-sm-8 col-sm-offset-1 col-xs-12 hidden-lg hidden-md event-page-info-square-section">
            <div class="header_event_member">
                {$date}
            </div>

            <div class="header_event_member">
                <strong>{$event.name}</strong>
            </div>

            <div class="header_event_member">
                created by <strong>{$event.username}</strong>
            </div>

            <div class="header_event_member">
                {if $event.free}
                    <p class="text-card">Free</p>
                {else}
                    <p class="text-card">Paid</p>
                {/if}
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 event-page-body white-page">

            <div class="row">
                <div class="col-sm-9">
                    <form class="form-inline">
                        <a href="#">
                            <button class="btn btn-default form-control">Save Event</button>
                        </a>
                        <a href="#">
                            <button class="btn btn-default form-control">Share Event</button>
                        </a>
                    </form>
                </div>

                <div class="col-sm-3">
                    {if !$event.free}
                        <a href="{$BASE_URL}pages/ticket/checkout-payment.php">
                            <button class="btn btn-default btn-primary form-control">Buy Tickets</button>
                        </a>
                    {/if}
                </div>
            </div>

            <div class="page-header">
                <h3>Description</h3>
            </div>
            <div class="description">

                {$event.description}

            </div>

            <div class="page-header">
                <h3>Location</h3>
            </div>

            <div class="map-section text-center">
                <div id="map" style="width: 100%; height: 300px;">
                    <input type="text" id="lat" value="{$event.latitude}" hidden/>
                    <input type="text" id="lon" value="{$event.longitude}" hidden/>
                </div>
                <h4> {$event.street} </h4>
            </div>

            <div class="page-header">
                <h3>Comments</h3>
            </div>








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
                        <input type="hidden" name="id" value="{$event_id}" />
                        <script>
                            CKEDITOR.replace('comment');
                            function CKupdate(){
                                for ( instance in CKEDITOR.instances )
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

<script type="text/javascript" src="../../scripts/event/show-map-location.js"></script>