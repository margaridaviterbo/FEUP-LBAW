<?php
include('../../templates/common/header.tpl');
include('../../config/init.php');
include('../../templates/common/menu.tpl');

if(isset($_SESSION['authenticated'])) {
    if ($_SESSION['authenticated'] == true) {
        include('../../templates/common/aside-menu.php');
    }
}
?>

<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
<div class="purchased-tickets">
  <h2>
    Purchased Tickets:
  </h2>

  <ul>
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            4/3/2017 <a href="#"> Event 1</a>
          </div>
          <button class="btn btn-default btn-primary col-sm-5">Download Ticket</button>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            4/3/2017 <a href="#"> Event 2</a>
          </div>
          <button class="btn btn-default btn-primary col-sm-5">Download Ticket</button>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            2/3/2017 <a href="#"> Event 3</a>
          </div>
          <button class="btn btn-default btn-primary col-sm-5">Download Ticket</button>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
</div>

<?php include('../../templates/common/footer.tpl'); ?>