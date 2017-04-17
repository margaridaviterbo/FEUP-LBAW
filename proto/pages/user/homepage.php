<?php include('../../database/user.php'); ?>
<div class="homepage">
  <div class="container-fluid text-left">
    <div class="page-title text-center">
      <h1>Popular Events: </h1>
      <br>
        <br>
          <br>
            <br>
    <?php $users = getAllUsers(); 
	print_r($users); ?>
	
    </div>
    <div class="row">
      <content class="col-sm-12">
        <?php include('../../templates/cards/homepage_event_card.php'); ?>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
        <div class="clearfix visible-md-block"></div>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
        <div class="clearfix visible-md-block"></div>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
		<?php include('../../templates/cards/homepage_event_card.php'); ?>
        <div class="clearfix visible-md-block"></div>
      </content>
    </div>
  </div>
</div>