{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                  <h1> Checkout Information</h1>
                </div>
                    <div class="row checkout-card">
                        <div class="col-sm-12 tags-personal-card">
						<form method="POST" action="../../actions/event/buy_ticket.php">
                            <div class="row content-ckeckout">
                                <div class="col-sm-2">
                                    <p class="tag-checkout-card" name="name">Nome:</p>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="user" class="form-control user-name" placeholder="Name"  value="{$NAME}" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                            <div class="row"><p></p></div>
                            <div class="row content-ckeckout">
                                <div class="col-sm-2">
							        <p class="tag-checkout-card" name="email">Email:</p>
                                </div>
                                <div class="col-sm-3">
                                    <input type="email" name="email" class="form-control email" placeholder="Email"  value="{$EMAIL}" aria-describedby="basic-addon1" required>

                                </div>
                            </div>
                            <div class="row"><p></p></div>
                            <div class="row content-checkout">
                                <div class="col-sm-2">
                                    <p class="tag-checkout-card">NIF:</p>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="nif" class="form-control nif" placeholder="NIF"  value="{$NIF}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row"><p></p></div>
                            <div class="row content-checkout">
                                <div class="col-sm-2">
                                    <p class="tag-checkout-card">Event:</p>
                                </div>
                                <div class="col-sm-3">
                                    <p id="evento">{$EVENT}</p>
                                </div>
                            </div>
                            <div class="row"><p></p></div>
                            <div class="row content-checkout">
                                <div class="col-sm-2">
                                    <p class="tag-checkout-card">Type:</p>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="ticketType" required>
                                    {foreach $TICKETS as $ticket}
                                        <option value="{$ticket.type_of_ticket_id}">{$ticket.ticket_type} - {$ticket.price}€ </option>
                                     {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="row"><p></p></div>
                            <div class="content-checkout">
                                <input type="hidden" name="id" value="{$event_id}" />
                            </div>
                            <div class="row content-checkout">
                                <div class="col-sm-2">
                                    <p class="tag-checkout-card">Quantity:</p>
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" name="quantity" class="form-control" value="1" required>
                                </div>
                            </div>
                            <div class="row"><p></p></div>
                            <div class="row content-checkout">
                                <div class="col-sm-3">
                                    <p class="tag-checkout-card">    </p>
                                </div>
                                <div class="col-sm-2">
                                    <input class="btn btn-default btn-primary form-control" type="submit" value="Confirm"/>
                                </div>
                            </div>
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