<?php include_once('../../config/init.php'); ?>
<?php include($HEADER_DIR); ?>
<?php include($MENU_USER_DIR); ?>
<?php include($ASSIDE_MENU_DIR); ?>

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Events that I attended</h1>
            </div>
            <?php include($BASE_DIR . 'templates/cards/atended_event_card.php'); ?>
            <?php include($BASE_DIR . 'templates/cards/atended_event_card.php'); ?>
			<?php include($BASE_DIR . 'templates/cards/atended_event_card.php'); ?>
			<?php include($BASE_DIR . 'templates/cards/atended_event_card.php'); ?>
			<?php include($BASE_DIR . 'templates/cards/atended_event_card.php'); ?>
			<?php include($BASE_DIR . 'templates/cards/atended_event_card.php'); ?>
		</content>
</div>

<?php include($FOTTER_DIR); ?>
