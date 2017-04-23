{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}


<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Events that I created</h1>
            </div>

            {if $events==NULL}
                <h3>You haven't created any events yet.</h3>
            {else}

                {foreach $events as $event}

                    <div class="container-fluid event-card-medium">
                        <p class="titulo-card">{$event.name}</p>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="../../resources/images/2.jpg"/>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-card"> Dia da semana, {$day} {$month} {$year} at {$time}</p>
                                <p class="text-card">ISG
                                <p>
                                    {if $event.free}
                                <p class="text-card">Gratuito</p>
                                {else}
                                <p class="text-card">Pago</p>
                                {/if}
                                <div class="container-fluid">
                                    <div class="row">

                                        <button onclick="window.location.href='../../pages/event/show-event-page.php'"
                                                type="button" class="btn btn-default col-sm-5">See Event
                                        </button>
                                        <button onclick="window.location.href='../../pages/event/edit-event.php'"
                                                type="button" class="btn btn-default col-sm-5">Edit Event
                                        </button>

                                        <div class="classifica-card col-sm-7">
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            {/if}
        </content>
    </div>
</div>


{include file='common/footer.tpl'}