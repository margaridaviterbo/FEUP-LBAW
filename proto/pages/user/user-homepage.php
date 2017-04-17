<?php include_once('../../config/init.php'); ?>
<?php include($BASE_DIR . 'templates/header.php'); ?>
<?php include($BASE_DIR . 'templates/menu-user.php'); ?>
<?php include($BASE_DIR . 'templates/aside-menu.php'); ?>

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Upcoming events </h1>
            </div>
            <?php include('../../templates/cards/atended_event_card.php'); ?>
            <?php include('../../templates/cards/atended_event_card.php'); ?>
			<?php include('../../templates/cards/atended_event_card.php'); ?>
			<?php include('../../templates/cards/atended_event_card.php'); ?>
			<?php include('../../templates/cards/atended_event_card.php'); ?>
			<?php include('../../templates/cards/atended_event_card.php'); ?>
		</content>
</div>

<?php include($BASE_DIR . 'templates/footer.php'); ?>
