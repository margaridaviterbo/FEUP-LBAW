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
                <h1>Upcoming events </h1>
            </div>
            <div class="event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/1.jpg" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG<p>
                        <p class="text-card">Gratuito</p>
                        <div class="container-fluid">
                            <div class="row">
                                <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More...</a>
                                <div class="classifica-card col-sm-7">
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/2.jpg" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG<p>
                        <p class="text-card">Gratuito</p>
                        <div class="container-fluid">
                            <div class="row">
                                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                                <div class="classifica-card col-sm-7">
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/1.jpg" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG<p>
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
            <div class="event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/4.png" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG<p>
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
            <div class="event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/5.png" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG<p>
                        <p class="text-card">Gratuito</p>
                        <div class="container-fluid">
                            <div class="row">
                                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                                <div class="classifica-card col-sm-7">
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/6.png" />
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG<p>
                        <p class="text-card">Gratuito</p>
                        <div class="container-fluid">
                            <div class="row">
                                <button type="button" class="btn btn-default col-sm-5">See More...</button>
                                <div class="classifica-card col-sm-7">
                                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
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

<?php include('../../templates/common/footer.tpl'); ?>