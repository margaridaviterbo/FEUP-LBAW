{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>{$page_title} </h1>
            </div>

            {foreach $events as $event}
        {assign var=rate value=getRating($event.event_id)}
    <div class="event-card-medium">
                <p class="titulo-card">{$event.name}</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="{$event.photo_url}" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> {$event.beginning_date}</p>
                        <p class="text-card">{$event.local_id}<p>

                    {if $event.free}
                        <p class="text-card">Gratuito</p>
                    {else}
                        <p class="text-card">Pago</p>                        
                    {/if}




                        
                        <div class="container-fluid">
                            <div class="row">
                                <a href="../event/show-event-page.php?id={$event.event_id}" class="btn btn-default col-sm-5">See More...</a>
                                <div class="classifica-card col-sm-7">

                                    {for $i=1 to $rate[0]['avg']}
                                        <i onclick="rate(1)" class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    {/for}
                                    {for $i=$rate[0]['avg']+1 to 5}
                                        <i onclick="rate(1)" class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                    {/for}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {/foreach}
    </div>
</div>

{include file='common/footer.tpl'}

<script>
    /*
    $(document).ready(function () {

        $('.sidebar-nav li a').click(function () {

            $('.sidebar-nav a').removeClass("selected");
            $(this).addClass("selected");
        });
    });*/

</script>