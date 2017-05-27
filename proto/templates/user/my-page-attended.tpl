{include file='common/header.tpl'}
{include file='common/aside-menu.tpl'}

<div class="container-fluid text-left">
    <div class="row">
        <content class="col-lg-offset-3 col-lg-6 col-sm-8 col-sm-8 col-sm-offset-1 col-xs-12 page">
            <div class="page-header">
                <h1>Events that I attended</h1>
            </div>

{foreach $events as $event}
        {assign var=rate value=getRating($event.event_id)}
<div class="container-fluid event-card-medium">
                <p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="../../resources/images/2.jpg"/>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-card"> Quinta, 9 de Março às 19:45</p>
                        <p class="text-card">ISG
                        <p>
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
            {/foreach}
    </div>
</div>

{include file='common/footer.tpl'}

<script>

    /*$(document).ready(function () {

        $('.sidebar-nav li a').click(function () {

            $('.sidebar-nav a').removeClass("selected");
            $(this).addClass("selected");
        });
    });*/

    /*document.getElementById("sidebar").onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById("sidebar").value);
    }

    if (localStorage.getItem('item')) {
        document.getElementById("selectedtem").options[localStorage.getItem('selectedtem')].selected = true;
    }*/


    /*
    $(function(){
        var url = window.location;
        // Will only work if string in href matches with location
        $('.sidebar-nav li a'[href="'+ url +'"]').parent().addClass('selected');

        // Will also work for relative and absolute hrefs
        $('.sidebar-nav li a'').filter(function() {
        return this.href == url;
    }).parent().addClass('selected');
    };*/



</script>
