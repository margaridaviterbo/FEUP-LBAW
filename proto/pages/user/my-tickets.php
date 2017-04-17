<?php include_once('../../config/init.php'); ?>
<?php include($HEADER_DIR); ?>
<?php include($MENU_USER_DIR); ?>
<?php include($ASSIDE_MENU_DIR); ?>

<div class="container-fluid text-left">
	  <div class="row">
		<content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
	<div class="purchased-tickets">
			<h2>
				Purchased Tickets:
			</h2>
			<ul>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
				<?php include('../../templates/cards/buyed_user_card.php'); ?>
			</ul>
		</div>
	</div>
</div>

<?php include($FOTTER_DIR); ?>
