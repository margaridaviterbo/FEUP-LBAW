{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}


<div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                  <h1> Checkout Infomation</h1>
                </div>
                    <div class="row ckeckout-card">
                        <div class="col-sm-12 tags-personal-card">
                            <div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Nome:</p><p id="nome">{$NAME}</p>
                                <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">NIF:</p>  <p id="morada">{$NIF}</p>
                                <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Event:</p>    <p id="evento">{$EVENT}</p>
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
                            <p id="custo">{$PRICE}€</p>
                          </div>

                          <form method="POST" action="../../actions/event/buy_ticket.php">
                                <input type="hidden" name="id" value="{$event_id}" />
                                <input class="btn btn-default btn-primary form-control" type="submit" value="Confirm"/>
                            </form>

                          <!--<a href="confirmation-payment.php">
                            <button class="btn btn-default btn-primary form-control">Pay with paypal</button>
                          </a>-->
                    </div>
                </div>
            </content>
    </div>
      </div>

{include file='common/footer.tpl'}