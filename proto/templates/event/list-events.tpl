{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>{$page_title}</h1>
            </div>

            {if $events==NULL}
                <h3>There are no events yet.</h3>
            {else}

                {foreach $events as $event}
                    <div id="event-card" class="event-card-medium">
                        <p class="titulo-card">{$event.name}</p>
                        <div class="row">
                            <div id="img" class="col-sm-4">
                                <img src="../../resources/images/2.jpg"/>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-card"> {$event.date}</p>
                                <p class="text-card"> {$event.location}</p>
                                    <a class="inactiveLink-text-card"></a>
                                    {if $event.free}
                                        <a class="inactiveLink-text-card">Free</a>
                                    {else}
                                        <a class="inactiveLink-text-card">Paid</a>
                                    {/if}
                                </div>
                                <div class="event-card-btns">
                                    {if !$event.pastEvent}
                                        <button onclick="window.location.href='{$BASE_URL}pages/event/show-event-page.php?id={$event.event_id}'"
                                                type="button" class="btn btn-default col-sm-5">See Event
                                        </button>
                                        <button onclick="window.location.href='../../pages/event/edit-event.php?id={$event.event_id}'"
                                                type="button" class="btn btn-default col-sm-5">Edit Event
                                        </button>
                                    {/if}
                                </div>

                                <div class="container-fluid">
                                    <div class="row">

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


                                        <div class="event-rate">

                                            {for $i=1 to $rate}
                                                <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                            {/for}
                                            {for $i=$rate+1 to 5}
                                                <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                            {/for}
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