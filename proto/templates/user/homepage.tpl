<div class="homepage">
  <div class="container-fluid text-left">
    <div class="page-title text-center">
      <h1>Popular Events: </h1>
      <br>
        <br>
          <br>
            <br>
			
	{$users|@print_r}
	
    </div>
    <div class="row">
      <content class="col-sm-12">
        {include file='cards/homepage_event_card.tpl'}
		{include file='cards/homepage_event_card.tpl'}
		{include file='cards/homepage_event_card.tpl'} 
        <div class="clearfix visible-md-block"></div>                
		{include file='cards/homepage_event_card.tpl'}
		{include file='cards/homepage_event_card.tpl'}
		{include file='cards/homepage_event_card.tpl'}
        <div class="clearfix visible-md-block"></div>                  
		{include file='cards/homepage_event_card.tpl'}
		{include file='cards/homepage_event_card.tpl'}
		{include file='cards/homepage_event_card.tpl'}
        <div class="clearfix visible-md-block"></div>
      </content>
    </div>
  </div>
</div>