<?php
include('../../templates/common/header.tpl');
include('../../config/init.php');
include('../../templates/common/menu.tpl');

if(isset($_SESSION['authenticated'])) {
    if ($_SESSION['authenticated'] == true) {
        include('../../templates/common/aside-menu.php');
    }
}
?>

<div class="container-fluid text-left">
  <div class="row">
    <content class="col-lg-offset-2 col-sm-8 col-sm-offset-1 col-xs-12 page">
        <div class="page-header">
            <h1>Search Results for "Festa" </h1>
        </div>

        <ul id="tabs">
          <li>
            <a href="#eventosPesq">Eventos (5)</a>
          </li>
          <li>
            <a href="#usersPesq">Utilizadores (1)</a>
          </li>
          <li>
            <a href="#tipoEventos">Tipo de Eventos (6)</a>
          </li>
        </ul>
        
        <div class="tabContentGroup">
          
          <div id="eventosPesq" class="tabContent">
            <div class="tabOptions">
              <input type="checkbox" name="Cost" value="free" checked=""> Free
              <input type="checkbox" name="Cost" value="paid" checked=""> Paid
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

            <div class="container-fluid event-card-medium">
              <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
              <div class="row">
                <div class="col-sm-3">
                  <img src="../../resources/images/1.jpg" />
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
                  <img src="../../resources/images/1.jpg" />
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
                  <img src="../../resources/images/1.jpg" />
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
                  <img src="../../resources/images/1.jpg" />
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
                  <img src="../../resources/images/1.jpg" />
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
          <div id="usersPesq" class="tabContent">
            <div class="tabOptions">
              <input type="checkbox" name="Cost" value="free" checked="">
                Matching events
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    Ordenate
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">Name descending</a>
                    </li>
                    <li>
                      <a href="#">Name ascending</a>
                    </li>
                  </ul>
                </div>
            </div>

            <div class="container-fluid user-card-medium">
              <p class="titulo-card">festa123</p>
              <div class="row">
                <div class="col-sm-3">
                  <img src="../../resources/images/image.jpeg" />
                </div>
                <div class="col-sm-9">
                  <p class="text-card"> Rui Vasco Oliveira Paiva</p>
                  <p class="text-card">up201405136@fe.up.pt</p>
                  <p class="text-card"> Events in common:</p>
                  <div class="events-in-common">
                  <ul>
                    <li>
                      <a href="#" class="text-card"> Festa da senhora da aparecida</a>
                    </li>
                    <li>
                      <a href="#" class="text-card"> Event2</a>
                    </li>
                    <li>
                      <a href="#" class="text-card"> Event3</a>
                    </li>
                    <li>
                      <a href="#" class="text-card"> Event 4</a>
                    </li>
                  </ul>
                  </div>
                  <button type="button" class="btn btn-default col-sm-5">Go To ptofile</button>
                </div>
              </div>
            </div>
          </div>
          <div id="tipoEventos" class="tabContent">
            <div class="tabOptions">
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
                    <img src="../../resources/images/1.jpg" />
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
                    <img src="../../resources/images/1.jpg" />
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
                    <img src="../../resources/images/1.jpg" />
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
                    <img src="../../resources/images/1.jpg" />
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
                    <img src="../../resources/images/1.jpg" />
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
                    <img src="../../resources/images/1.jpg" />
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
    </content>
  </div>
</div>

<?php include('../../templates/common/footer.tpl'); ?>