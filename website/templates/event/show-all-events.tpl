{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}


    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Events that I created</h1>
                </div>

                {foreach $events as $event}
                    <div class="container-fluid event-card-medium">
                        <p class="titulo-card">{$event.name}</p>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="../../resources/images/2.jpg" />
                            </div>
                            <div class="col-sm-9">
                                <p class="text-card"> Dia da semana, {$event.beginning_date} às horas</p>
                                <p class="text-card">ISG<p>
                                {if $event.free}
                                    <p class="text-card">Gratuito</p>
                                {else}
                                    <p class="text-card">Pago</p>
                                {/if}
                                <div class="container-fluid">
                                    <div class="row">

                                        <button onclick="window.location.href='../event/show-event-page.php'" type="button" class="btn btn-default col-sm-5">See Event</button>
                                        <button onclick="window.location.href='../event/my-page-edit-event.php'" type="button" class="btn btn-default col-sm-5">Edit Event</button>

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
            </content>
        </div>
    </div>

{include file='common/footer.tpl'}