{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="container-fluid text-left page">
                <div class="page-header">
                    <h1>Search Results for "{$serch}" </h1>
                </div>
                <p hidden id="searched-words">{$serch}</p>
                <p hidden id="serch-num-page-user">0</p>
                <p hidden id="serch-num-page-event">0</p>

                <ul id="tabs">
                    <li>
                        <a class="button-events" href="#eventosPesq">Events (0)</a>
                    </li>
                    <li>
                        <a class="button-users" href="#usersPesq">Users (0)</a>
                    </li>
                </ul>

                <div class="tabContentGroup">

                    <div id="eventosPesq" class="tabContent">
						<div class="tabOptions tabOptionsEvets">
						  <input type="checkbox" name="free-order-event" value="free" checked=""> Free
						  <input type="checkbox" name="paid-order-event" value="paid" checked=""> Paid

							<div class='alfabetic-ordering'>
								Order:
								<input type="radio" name="alfa-order-event" value="ASC" checked>Ascending
								<input type="radio" name="alfa-order-event" value="DESC">Descending
							</div>
							
							<div class='alfabetic-ordering'>
								By:
								<input type="radio" name="type-order-event" value="1" checked>Relevance
								<input type="radio" name="type-order-event" value="2" checked>Name
							</div>
						</div>
                        <div class="eventcadssech">


                        </div>
                    </div>
                    <div id="usersPesq" class="tabContent">

                        <div class="tabOptions tabOptionsUsers">
                            <div class='alfabetic-ordering'>
                                Alfabetic order:
                                <input type="radio" name="alfa-order-users" value="ASC" checked>Ascending
                                <input type="radio" name="alfa-order-users" value="DESC">Descending
                            </div>
                        </div>

                        <div class="usercadssech">
                        </div>
                    </div>

					</div>
            </div>
        </content>
    </div>
</div>

{include file='common/footer.tpl'}
<script src="{$BASE_URL}scripts/search/search.js"></script>