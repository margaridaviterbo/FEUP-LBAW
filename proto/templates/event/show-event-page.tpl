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

            <div class="event-creator">
                created by <strong>{$event.username}</strong>
            </div>

            <div class="event-rate">
                Rate:
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
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
            <div class="">
                {$date}
            </div>

            <div class="">
                <strong>{$event.name}</strong>
            </div>

            <div class="">
                created by <strong>{$event.username}</strong>
            </div>

            <div class="">
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
            <div class="text">

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

            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="{$BASE_URL}resources/images/user.png">
                    </div>
                </div>

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>awesome1</strong> <span class="text-muted">commented 5 days ago</span>
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
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="{$BASE_URL}resources/images/user.png">
                    </div>
                </div>

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>awesome2</strong> <span class="text-muted">commented 4 days ago</span>
                        </div>
                        <div class="panel-body">
                            Offered say visited elderly and. Waited period are played family man formed. He ye body or
                            made on pain part meet. You one delay nor begin our folly abode. By disposed replying mr me
                            unpacked no. As moonlight of my resolving unwilling.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="{$BASE_URL}resources/images/user.png">
                    </div>
                </div>

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>awesome3</strong> <span class="text-muted">commented 4 days ago</span>
                        </div>
                        <div class="panel-body">
                            <div class="comment">
                                OMG, look at us!!
                            </div>
                            <img src="{$BASE_URL}resources/images/3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}

<script type="text/javascript" src="../../scripts/event/show-map-location.js"></script>