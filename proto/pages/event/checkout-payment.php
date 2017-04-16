<?php include_once('../config/init.php'); ?>
<?php include('../templates/header.php'); ?>
<?php include('../templates/menu-user.php'); ?>
<?php include('../templates/aside-menu.php'); ?>


    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                  <h1> Checkout Infomation</h1>
                </div>
                    <div class="row ckeckout-card">
                        <div class="col-sm-12 tags-personal-card">
                            <div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Nome:</p><p id="nome">Rui Paiva</p>
                                <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Morada:</p>  <p id="morada">Rua das Flores, Porto, Portugal</p>
                                <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Event:</p>    <p id="evento">Evento1</p>
                            </div>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                              Type of ticket
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="#">Type 0</a>
                              </li>
                              <li>
                                <a href="#">Type 1</a>
                              </li>
                              <li>
                                <a href="#">Type 2</a>
                              </li>
                              <li>
                                <a href="#">Type 3</a>
                              </li>
                            </ul>
                          </div>
                          <div class="content-ckeckout">
                            <p class="tag-ckeckout-card">Custo:</p>
                            <p id="custo">10€</p>
                          </div>
                          <a href="../pages/comfirmation-payment.php">
                            <button class="btn btn-default btn-primary form-control">Pay with paypal</button>
                          </a>
                    </div>
                </div>
            </content>
    </div>
      </div>

<?php include('../templates/footer.php'); ?>
