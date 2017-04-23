{include file='common/header.tpl'}

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
  <li>
    <a class="button-type" href="#tipoEventos">Types of Events (0)</a>
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
			<input type="radio" name="type-order-event" value="3">Price
		</div>
    </div>
	
	<div class="eventcadssech">

    
	</div>
  </div>
  <div id="usersPesq" class="tabContent">
    
	<div class="tabOptions tabOptionsUsers">
      <input type="checkbox" name="match-events-users" value="free" checked>
        Matching events
		<div class='alfabetic-ordering'>
			Alfabetic order:
			<input type="radio" name="alfa-order-users" value="ASC" checked>Ascending
			<input type="radio" name="alfa-order-users" value="DESC">Descending
		</div>
  </div>
    
	<div class="usercadssech">
    </div>
  </div>
  <div id="tipoEventos" class="tabContent">
    <div class="tabOptions tabOptionsTypes">
      <input type="checkbox" name="Cost" value="free" checked="">
        Free
        <input type="checkbox" name="Cost" value="paid" checked="">
          Paid
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              Ordenate
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li>
                <a href="#">Price descending</a>
              </li>
              <li>
                <a href="#">Price ascending</a>
              </li>
              <li>
                <a href="#">Name descending</a>
              </li>
              <li>
                <a href="#">Name ascending</a>
              </li>
            </ul>
          </div>
        </div>

    <h1>
      Festas Populares (5)
    </h1>
    <div class="tipoEventos-card">
      <div class="container-fluid event-card-medium">
        <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
        <div class="row">
          <div class="col-sm-3">
            <img src="../resources/images/1.jpg" />
          </div>
          <div class="col-sm-9">
            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
            <p class="text-card">ISG</p>
            <p class="text-card">Gratuito</p>
            <div class="container-fluid">
              <div class="row">
                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                <div class="classifica-card col-sm-7">
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid event-card-medium">
        <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
        <div class="row">
          <div class="col-sm-3">
            <img src="../resources/images/1.jpg" />
          </div>
          <div class="col-sm-9">
            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
            <p class="text-card">ISG</p>
            <p class="text-card">Gratuito</p>
            <div class="container-fluid">
              <div class="row">
                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                <div class="classifica-card col-sm-7">
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid event-card-medium">
        <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
        <div class="row">
          <div class="col-sm-3">
            <img src="../resources/images/1.jpg" />
          </div>
          <div class="col-sm-9">
            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
            <p class="text-card">ISG</p>
            <p class="text-card">Gratuito</p>
            <div class="container-fluid">
              <div class="row">
                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                <div class="classifica-card col-sm-7">
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid event-card-medium">
        <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
        <div class="row">
          <div class="col-sm-3">
            <img src="../resources/images/1.jpg" />
          </div>
          <div class="col-sm-9">
            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
            <p class="text-card">ISG</p>
            <p class="text-card">Gratuito</p>
            <div class="container-fluid">
              <div class="row">
                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                <div class="classifica-card col-sm-7">
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="button" class="btn btn-default see-more-evets">See More (1)...</button>
    </div>

    <h1>
      Festas de cinema (2)
    </h1>
    <div class="tipoEventos-card">
      <div class="container-fluid event-card-medium">
        <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
        <div class="row">
          <div class="col-sm-3">
            <img src="../resources/images/1.jpg" />
          </div>
          <div class="col-sm-9">
            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
            <p class="text-card">ISG</p>
            <p class="text-card">Gratuito</p>
            <div class="container-fluid">
              <div class="row">
                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                <div class="classifica-card col-sm-7">
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid event-card-medium">
        <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
        <div class="row">
          <div class="col-sm-3">
            <img src="../resources/images/1.jpg" />
          </div>
          <div class="col-sm-9">
            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
            <p class="text-card">ISG</p>
            <p class="text-card">Gratuito</p>
            <div class="container-fluid">
              <div class="row">
                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                <div class="classifica-card col-sm-7">
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
		
{include file='common/footer.tpl'}
<script src="{$BASE_URL}scripts/serch/serch.js"></script>