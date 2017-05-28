{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
<div class="purchased-tickets">
  <h2>
    Purchased Tickets:
  </h2>

  <ul>
  {foreach $TICKETS as $ticket}
    <li>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            <a href="#">{$ticket.ticket_type}</a>
          </div>
          <a href="{$BASE_URL}database/pdf/{$ticket.ticket_id}.pdf"><button class="btn btn-default btn-primary col-sm-5">Download Ticket</button></a>
          <div class="col-sm-5">
          </div>
        </div>
      </div>
    </li>
	{/foreach}
  </ul>
</div>
</div>
</div>

{include file='common/footer.tpl'}