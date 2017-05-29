{include file='common/header.tpl'}


<div class="admin">
    <div class="container-fluid text-left">

        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Admin Notifications</h1>
                </div>
				
				{foreach $notifications as $notification}
				{if $notification.notification_type == 'userReport'}
				<div class="notification-card-medium">
                    <div class="row">
                        <div class="col-sm-11">
                            <a class="notification-content">
                                Someone reported on the event
								<a href="{$BASE_URL}pages/common/user-page-information.php?id={$notification.user_id}">{$notification.username}</a>.
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
				
				{if $notification.notification_type == 'eventInvitation'}
				<div class="notification-card-medium">
                    <div class="row">
                        <div class="col-sm-11">
                            <a class="notification-content">
                                You Were invited for 
								<a href="{$BASE_URL}pages/common/user-page-information.php?id={$notification.event_id}">{$notification.name}</a>.
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
</div>


{include file='common/footer.tpl'}