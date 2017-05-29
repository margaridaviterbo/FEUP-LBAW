{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Notifications</h1>
                </div>
				
				{foreach $NOTIFICATIONS as $notification}
				{if $notification.notification_type == 'eventCommented'}
				<div class="notification-card-medium">
                    <div class="row">
                        <div class="col-sm-11">
                            <a class="notification-content">
                                Someone commented on the event
								<a href="{$BASE_URL}pages/event/show-event-page.php?id={$notification.event_id}">{$notification.name}</a>.
                            </a>
                        </div>
                        <div class="notification-btn col-sm-1">
                            <!--TODO fazer desaparecer a notificaçao-->
                            <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <p class="notification-date"><span class="glyphicon glyphicon-time"></span>{$notification.notification_date}</p>
                        </div>
                        <div class="notification-btn col-sm-1">
                            <!--TODO mostrar coisa que gerou notificaçao-->
                            <a href="#"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </div>
                    </div>
                </div>
				{/if}
				
				
				{/foreach}

            </content>
        </div>
    </div>

{include file='common/footer.tpl'}