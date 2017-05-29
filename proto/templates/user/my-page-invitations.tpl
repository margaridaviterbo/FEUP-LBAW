{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

    <div class="container-fluid text-left">
        <div class="row">
            <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-offset-1 col-xs-12 page">
                <div class="page-header">
                    <h1>Events that I am invited for</h1>
                </div>
                <div id="event-card" class="event-card-medium">
                    <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                    <div class="row">
                        <div id="img" class="col-sm-4">
                            <img src="../../resources/images/1.jpg" />
                        </div>
                        <div class="col-sm-8">
                            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                            <p class="text-card">ISG<p>
                            <div id="btns-row" class="row">
                                <a class="inactiveLink-text-card">Gratuito</a>
                                <div class="event-card-btns">
                                    <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More</a>
                                    <button type="button" class="btn btn-default col-sm-3">Going</button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                        <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                            <input id="rate" type="hidden" name="rating"/>
                                            <input type="hidden" name="id" value="{$event_id}"/>
                                        </form>

                                        <script type="text/javascript">
                                            function rate(val) {
                                                $("#rate").val(val);
                                                $("#rform").submit();
                                            }
                                        </script>


                                    <div class="event-rate">

                                        {for $i=1 to $rate}
                                            <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                        {/for}
                                        {for $i=$rate+1 to 5}
                                            <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                        {/for}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="event-card" class="event-card-medium">
                    <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                    <div class="row">
                        <div id="img" class="col-sm-4">
                            <img src="../../resources/images/1.jpg" />
                        </div>
                        <div class="col-sm-8">
                            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                            <p class="text-card">ISG<p>
                            <div id="btns-row" class="row">
                                <a class="inactiveLink-text-card">Gratuito</a>
                                <div class="event-card-btns">
                                    <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More</a>
                                    <button type="button" class="btn btn-default col-sm-3">Going</button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                    <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                        <input id="rate" type="hidden" name="rating"/>
                                        <input type="hidden" name="id" value="{$event_id}"/>
                                    </form>

                                    <script type="text/javascript">
                                        function rate(val) {
                                            $("#rate").val(val);
                                            $("#rform").submit();
                                        }
                                    </script>


                                    <div class="event-rate">

                                        {for $i=1 to $rate}
                                            <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                        {/for}
                                        {for $i=$rate+1 to 5}
                                            <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                        {/for}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="event-card" class="event-card-medium">
                    <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                    <div class="row">
                        <div id="img" class="col-sm-4">
                            <img src="../../resources/images/1.jpg" />
                        </div>
                        <div class="col-sm-8">
                            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                            <p class="text-card">ISG<p>
                            <div id="btns-row" class="row">
                                <a class="inactiveLink-text-card">Gratuito</a>
                                <div class="event-card-btns">
                                    <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More</a>
                                    <button type="button" class="btn btn-default col-sm-3">Going</button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                    <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                        <input id="rate" type="hidden" name="rating"/>
                                        <input type="hidden" name="id" value="{$event_id}"/>
                                    </form>

                                    <script type="text/javascript">
                                        function rate(val) {
                                            $("#rate").val(val);
                                            $("#rform").submit();
                                        }
                                    </script>


                                    <div class="event-rate">

                                        {for $i=1 to $rate}
                                            <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                        {/for}
                                        {for $i=$rate+1 to 5}
                                            <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                        {/for}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="event-card" class="event-card-medium">
                    <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                    <div class="row">
                        <div id="img" class="col-sm-4">
                            <img src="../../resources/images/1.jpg" />
                        </div>
                        <div class="col-sm-8">
                            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                            <p class="text-card">ISG<p>
                            <div id="btns-row" class="row">
                                <a class="inactiveLink-text-card">Gratuito</a>
                                <div class="event-card-btns">
                                    <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More</a>
                                    <button type="button" class="btn btn-default col-sm-3">Going</button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                    <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                        <input id="rate" type="hidden" name="rating"/>
                                        <input type="hidden" name="id" value="{$event_id}"/>
                                    </form>

                                    <script type="text/javascript">
                                        function rate(val) {
                                            $("#rate").val(val);
                                            $("#rform").submit();
                                        }
                                    </script>


                                    <div class="event-rate">

                                        {for $i=1 to $rate}
                                            <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                        {/for}
                                        {for $i=$rate+1 to 5}
                                            <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                        {/for}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="event-card" class="event-card-medium">
                    <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                    <div class="row">
                        <div id="img" class="col-sm-4">
                            <img src="../../resources/images/1.jpg" />
                        </div>
                        <div class="col-sm-8">
                            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                            <p class="text-card">ISG<p>
                            <div id="btns-row" class="row">
                                <a class="inactiveLink-text-card">Gratuito</a>
                                <div class="event-card-btns">
                                    <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More</a>
                                    <button type="button" class="btn btn-default col-sm-3">Going</button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                    <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                        <input id="rate" type="hidden" name="rating"/>
                                        <input type="hidden" name="id" value="{$event_id}"/>
                                    </form>

                                    <script type="text/javascript">
                                        function rate(val) {
                                            $("#rate").val(val);
                                            $("#rform").submit();
                                        }
                                    </script>


                                    <div class="event-rate">

                                        {for $i=1 to $rate}
                                            <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                        {/for}
                                        {for $i=$rate+1 to 5}
                                            <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                        {/for}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="event-card" class="event-card-medium">
                    <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                    <div class="row">
                        <div id="img" class="col-sm-4">
                            <img src="../../resources/images/1.jpg" />
                        </div>
                        <div class="col-sm-8">
                            <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                            <p class="text-card">ISG<p>
                            <div id="btns-row" class="row">
                                <a class="inactiveLink-text-card">Gratuito</a>
                                <div class="event-card-btns">
                                    <a href="../event/show-event-page.php" class="btn btn-default col-sm-5">See More</a>
                                    <button type="button" class="btn btn-default col-sm-3">Going</button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">

                                    <form id="rform" action="../../actions/event/rate_event.php" method="POST">
                                        <input id="rate" type="hidden" name="rating"/>
                                        <input type="hidden" name="id" value="{$event_id}"/>
                                    </form>

                                    <script type="text/javascript">
                                        function rate(val) {
                                            $("#rate").val(val);
                                            $("#rform").submit();
                                        }
                                    </script>


                                    <div class="event-rate">

                                        {for $i=1 to $rate}
                                            <i onclick="rate(1)" class="fa fa-star fa" aria-hidden="true"></i>
                                        {/for}
                                        {for $i=$rate+1 to 5}
                                            <i onclick="rate(1)" class="fa fa-star-o fa" aria-hidden="true"></i>
                                        {/for}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </content>
        </div>
    </div>
{include file='common/footer.tpl'}