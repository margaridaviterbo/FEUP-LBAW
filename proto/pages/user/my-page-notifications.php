<?php include_once('../../config/init.php'); ?>
<?php include('../../templates/header.php'); ?>
<?php include('../../templates/menu-user.php'); ?>
<?php include('../../templates/aside-menu.php'); ?>

    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Notifications</h1>
                </div>
				<?php include('../../templates/cards/notification_user_card.php'); ?>
            </content>
        </div>
    </div>

<?php include('../../templates/footer.php'); ?>