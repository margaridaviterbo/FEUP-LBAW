{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                  <h1> Checkout Infomation</h1>
                </div>
                    <div class="row ckeckout-card">
                        <div class="col-sm-12 tags-personal-card">
						<form method="POST" action="../../actions/event/buy_ticket.php">
                            <div class="content-ckeckout">
                                <p class="tag-ckeckout-card" name="name">Nome:</p><input type="text" name="user" value="{$NAME}">
                            </div><div class="content-ckeckout">
							<p class="tag-ckeckout-card" name="email">Email:</p><input type="email" name="email" value="{$EMAIL}" required>
							</div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">NIF:</p> <input type="number" name="nif" value="{$NIF}">
                            </div><div class="content-ckeckout">
                                <p class="tag-ckeckout-card">Event:</p>    <p id="evento">{$EVENT}</p>
                            </div>
							<p class="tag-ckeckout-card">Type:</p>
                            <select name="ticketType">
							{foreach $TICKETS as $ticket}
                               <option value="{$ticket.type_of_ticket_id}">{$ticket.ticket_type} - {$ticket.price}€ </option>
							 {/foreach}
                            </select>
								<div class="content-ckeckout">
                                <input type="hidden" name="id" value="{$event_id}" />
								</div><div class="content-ckeckout">
								<p class="tag-ckeckout-card">Quantity:</p> <input type="number" name="quantity" value="1" required>
								</div>
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