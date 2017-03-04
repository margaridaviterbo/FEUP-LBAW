<?php
include('../templates/header.php');
include('../templates/menu-user.php');
?>


<div class="container">

    <div class="event-page-header">
        <div class="event-page-image-section">
            <img src="../resources/images/1.jpg" alt="Event" class="event-page-photo"/>
        </div>

        <div class="event-page-info-square-section">

            <div class="event-date">
                THURSDAY, 9TH MARCH, 19h45
            </div>

            <div class="event-name">
                <strong>Sessão de Demonstração para o Desenvolvimento em Comunicação</strong>
            </div>

            <div class="event-creator">
                created by ...
            </div>

            <div class="event-price">
               Gratuito
            </div>

        </div>

    </div>

    <div class="event-page-body white-page">

        <form class="form-inline">
            <a href="#"><button class="btn btn-default form-control">Save Event</button></a>
            <a href="#"><button class="btn btn-default form-control">Share Event</button></a>
            <a href="#"><button class="btn btn-default form-control pull-right">Buy Tickets</button></a>
        </form>


        <div class="page-header">
            <h3>Description</h3>
        </div>
        <div class="text">
            <p>
                Curso leccionado pelo enólogo João Carlos Guedes, onde se irão abordar os seguintes temas :

                História do vinho e da vinha
                Principais regiões vitivinícolas portuguesas
                Como é que o vinho tem tantos aromas?
                Como se faz um vinho?
                Comida com vinho - exemplos de harmonização, com degustação de petiscos tradicionais ao longo do curso
                Diferentes temperaturas
                Como provar um vinho?
                Degustação de vinhos e petiscos

                O curso tem a duração aproximada de 3 horas. A Wine Love You fornece todos os petiscos e vinhos para prova. No final do curso será entregue um diploma de participação.

                Inclui:

                Vinhos e petiscos para prova
                Diploma de participação
                Material didáctico (enviado posteriormente via email)

            </p>
        </div>

        <div class="page-header">
            <h3>Location</h3>
        </div>

        <div class="map-section text-center">
            <img src="../resources/images/map.png" class="map-image"/>
            <h4> 131 Rua de Sá da Bandeira, 4000-427 Porto </h4>
        </div>

    </div>
</div>

<?php include('../templates/footer.php'); ?>
