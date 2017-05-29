{include file='common/header.tpl'}

<div class="col-lg-12 homepage">

    <div class="container">
        <div id="products" class="row list-group">
            <div class="row">

                {foreach $events as $event}
                    <div class="eventThumb col-lg-4 col-md-4 col-sm-4">
                        <div class="thumbnail ">
                            <img class="group list-group-image" src="../../resources/images/sunset.jpg" alt=""/>
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">
                                    {$event.name}</h4>
                                <p class="event-date"><span class="glyphicon glyphicon-time"></span>{$event.date}</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <a class="view-event btn btn-success" href="../event/show-event-page.php?id={$event.event_id}">See
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}