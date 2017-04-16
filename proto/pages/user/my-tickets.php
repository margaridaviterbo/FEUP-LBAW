<?php include_once('../../config/init.php'); ?>
<?php include('../../templates/header.php'); ?>
<?php include('../../templates/menu-user.php'); ?>
<?php include('../../templates/aside-menu.php'); ?>

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
<?php include('../../templates/footer.php'); ?>
