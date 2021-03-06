﻿<?php
include('../../templates/common/header.tpl');
include('../../config/init.php');
include('../../templates/common/menu.tpl');

if(isset($_SESSION['authenticated'])) {
    if ($_SESSION['authenticated'] == true) {
        include('../../templates/common/aside-menu.tpl');
    }
}
?>

<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
      <div class="page-header">
        <h1>Payment Confirmed</h1>
      </div>
      <div class="row payed-card">
        <div class="col-sm-12 tags-personal-card">
          <div class="content-ckeckout">
            <p class="tag-ckeckout-card">Nome:</p>
            <p id="nome">Rui Paiva</p>
          </div>
          <div class="content-ckeckout">
            <p class="tag-ckeckout-card">Morada:</p>
            <p id="morada">Rua das Flores, Porto, Portugal</p>
          </div>
          <div class="content-ckeckout">
            <p class="tag-ckeckout-card">Event:</p>
            <p id="evento">Evento1</p>
          </div>
          <div class="content-ckeckout">
            <p class="tag-ckeckout-card">Type of ticket:</p>
            <p id="evento">Type 1</p>
          </div>
          <div class="content-ckeckout">
            <p class="tag-ckeckout-card">Custo:</p>
            <p id="custo">10€</p>
          </div>
          <a href="#">
            <button class="btn btn-default btn-primary form-control">Download ticket</button>
          </a>
          <br>
            <br>
              <a href="../event/show-event-page.php">
                <button class="btn btn-default btn-primary form-control">Go back to evet</button>
              </a>
            </div>
      </div>
  </content>
</div>
</div>

<?php include('../../templates/common/footer.tpl'); ?>
