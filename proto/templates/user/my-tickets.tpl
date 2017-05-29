{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
<div class="purchased-tickets">

  <div class="page-header">
    <h1>Purchased Tickets:</h1>
  </div>

  <ul>
  {foreach $TICKETS as $ticket}

    <li>
      <div class="ticket-info container-fluid">
        <div class="row">
          <div class="ticket-specification col-sm-6">
            <a href="{$BASE_URL}pages/event/show-event-page.php?id={$ticket.meta_event_id}">{$ticket.name}   -   {$ticket.ticket_type}</a>
          </div>
          <div class="col-sm-5">
            <p>Purchase date: {$ticket.ticket_purchase_date}</p>
          </div>
          <div class="download-ticket-btn col-sm-1">
            <a href="{$BASE_URL}database/pdf/{$ticket.ticket_id}.pdf"><span class="glyphicon glyphicon-download-alt"></span></a>
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