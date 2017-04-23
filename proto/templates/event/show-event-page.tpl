{include file='common/header.tpl'}

{if $USERNAME}
    {include file='common/aside-menu.tpl'}
{/if}

<div class="container-fluid">

    <div class="row event-page-header">
        <div class="col-lg-offset-3 col-lg-4 col-md-6 col-md-offset-1 hidden-sm hidden-xs event-page-image-section white-page">
            <img src="../../resources/images/1.jpg" alt="Event" class="event-page-photo img-responsive "/>
        </div>

        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs event-page-info-square-section">
            <div class="event-date">
                THURSDAY, 9TH MARCH, 19h45
            </div>

            <div class="event-name">
                <strong>Sessão de Demonstração para o Desenvolvimento em Comunicação</strong>
            </div>

            <div class="event-creator">
                created by ...
            </div>

            <div class="event-rate">
                Rate:
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
                <i class="fa fa-star-o fa-2x" aria-hidden="true"></i>
            </div>

            <div class="event-price">
                13 - 20€
            </div>
        </div>

    </div>

    <div class="row event-page-header-small">

        <div class="col-sm-8 col-sm-offset-1 col-xs-12 hidden-lg hidden-md event-page-image-section white-page">
            <img src="../../resources/images/1.jpg" alt="Event" class="event-page-photo img-responsive "/>
        </div>
    </div>

    <div class="row event-page-header-small">

        <div class="col-sm-8 col-sm-offset-1 col-xs-12 hidden-lg hidden-md event-page-info-square-section">
            <div class="">
                THURSDAY, 9TH MARCH, 19h45
            </div>

            <div class="">
                <strong>Sessão de Demonstração para o Desenvolvimento em Comunicação</strong>
            </div>

            <div class="">
                created by ...
            </div>

            <div class="">
                Gratuito
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 event-page-body white-page">

            <div class="row">
                <div class="col-sm-9">
                    <form class="form-inline">
                        <a href="#">
                            <button class="btn btn-default form-control">Save Event</button>
                        </a>
                        <a href="#">
                            <button class="btn btn-default form-control">Share Event</button>
                        </a>
                    </form>
                </div>

                <div class="col-sm-3">
                    <a href="../../pages/ticket/checkout-payment.php">
                        <button class="btn btn-default btn-primary form-control">Buy Tickets</button>
                    </a>
                </div>
            </div>

            <div class="page-header">
                <h3>Description</h3>
            </div>
            <div class="text">

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus nibh sed tincidunt laoreet.
                    Nulla elementum, turpis eget laoreet vestibulum, enim mi eleifend quam, ut ultricies sem nibh varius
                    mi. Integer hendrerit lacus nunc, pulvinar luctus lacus venenatis accumsan. Curabitur quam quam,
                    ultricies ac interdum a, blandit a odio. Suspendisse viverra ipsum in arcu feugiat, ut blandit dui
                    interdum. Nulla varius massa eget mi sodales posuere. Nulla aliquet, tortor commodo venenatis
                    sodales, tortor sem vulputate elit, non scelerisque nibh metus sed velit. Ut mi lorem, tincidunt a
                    erat vel, sodales ultricies diam. Donec dictum lobortis tellus id faucibus.</p>

                <p>Donec justo sem, iaculis at tempus sed, consequat eget ex. Curabitur efficitur sit amet urna sit amet
                    fermentum. Integer aliquet porta tortor in finibus. Morbi eleifend, velit sed cursus tempor, ante
                    arcu egestas leo, a gravida tellus nunc id quam. Sed ac semper lectus. Etiam odio orci, lobortis
                    eget posuere elementum, volutpat eget tellus. Phasellus consequat auctor turpis euismod finibus. Ut
                    accumsan dui quis mi aliquam, in malesuada ante facilisis. Etiam nec consectetur arcu. Etiam
                    pulvinar vestibulum scelerisque. Fusce ipsum dui, rhoncus ac sem at, vehicula efficitur purus.
                    Curabitur vitae tincidunt ligula. Nam sit amet malesuada tellus. Vivamus et dolor fringilla nibh
                    tincidunt egestas vel sit amet nulla. Maecenas in accumsan est. </p>

                <p>Cras lacus ligula, ultricies tempor erat quis, accumsan accumsan erat. Vivamus malesuada eros eget
                    lectus egestas egestas. Ut nunc magna, gravida eu mauris in, volutpat tincidunt tellus. Quisque
                    convallis ipsum nisl, in ornare sapien pellentesque a. Integer porttitor ipsum sem, ac vehicula
                    sapien vehicula vel. Fusce ullamcorper bibendum enim at congue. Quisque non pharetra tortor.
                    Maecenas tristique nibh vel magna pharetra, posuere aliquet justo ultrices. Fusce ac nisl non dolor
                    facilisis euismod eget id turpis. Pellentesque mattis ante id mi ultrices faucibus. Nunc dictum
                    lorem eget nunc cursus auctor. Quisque sit amet sapien laoreet, hendrerit nulla vel, maximus massa.
                    Nam suscipit, erat eu dictum commodo, sapien ipsum fringilla nibh, sed sodales purus risus et
                    sem.</p>
            </div>

            <div class="page-header">
                <h3>Location</h3>
            </div>

            <div class="map-section text-center">
                <img src="../../resources/images/map.png" class="map-image"/>
                <h4> 131 Rua de Sá da Bandeira, 4000-427 Porto </h4>
            </div>

            <div class="page-header">
                <h3>Comments</h3>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="../../resources/images/user.png">
                    </div>
                </div>

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>awesome1</strong> <span class="text-muted">commented 5 days ago</span>
                        </div>
                        <div class="panel-body">
                            On it differed repeated wandered required in. Then girl neat why yet knew rose spot.
                            Moreover property we he kindness greatest be oh striking laughter. In me he at collecting
                            affronting principles apartments. Has visitor law attacks pretend you calling own excited
                            painted. Contented attending smallness it oh ye unwilling. Turned favour man two but lovers.
                            Suffer should if waited common person little oh. Improved civility graceful sex few smallest
                            screened settling. Likely active her warmly has.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="../../resources/images/user.png">
                    </div>
                </div>

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>awesome2</strong> <span class="text-muted">commented 4 days ago</span>
                        </div>
                        <div class="panel-body">
                            Offered say visited elderly and. Waited period are played family man formed. He ye body or
                            made on pain part meet. You one delay nor begin our folly abode. By disposed replying mr me
                            unpacked no. As moonlight of my resolving unwilling.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="../../resources/images/user.png">
                    </div>
                </div>

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>awesome3</strong> <span class="text-muted">commented 4 days ago</span>
                        </div>
                        <div class="panel-body">
                            <div class="comment">
                                OMG, look at us!!
                            </div>
                            <img src="../../resources/images/3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {include file='common/footer.tpl'}
