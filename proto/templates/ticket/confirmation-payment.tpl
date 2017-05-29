{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}


<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-8 col-sm-offset-1 col-xs-12 page">
      <div class="payed-card">
        <div class="row">
          <h1><span class="glyphicon glyphicon-check"></span>Payment Confirmed</h1>
        </div>
        <div class="row">
          <div class="col-sm-12 tags-personal-card">
            <a href="{$BASE_URL}api/ticket/getPdf.php?id={$ID}" target="_blank">
              <button class="btn btn-default btn-primary form-control" id="download-ticket">Download ticket</button>
            </a>
          </div>
          <div class="row">
            <a href="../event/show-event-page.php?id={$IDEVENT}">
              <button class="btn btn-default btn-primary form-control">Go back to event</button>
            </a>
          </div>
        </div>
      </div>
    </content>
  </div>
</div>


{include file='common/footer.tpl'}

<script>
  document.getElementById("download-ticket").click(); // Click on the checkbox
</script>
