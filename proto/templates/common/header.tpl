<!DOCTYPE html>

<html>

<head>
    <title>Eventify</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link rel="stylesheet" href="{$BASE_URL}css/font-awesome.min.css">
    <link rel="stylesheet" href="{$BASE_URL}css/reset.css">
    <link rel="stylesheet" href="{$BASE_URL}lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$BASE_URL}css/style.css">
    <link rel="stylesheet" href="{$BASE_URL}css/menu.css">
    <link rel="stylesheet" href="{$BASE_URL}css/event.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <script src="{$BASE_URL}lib/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript"
            src='http://maps.google.com/maps/api/js?key=AIzaSyA3phNNq0EMPtIndXE0ncMDoHGHxzw3iDk&libraries=places'></script>
    <script src="https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyA3phNNq0EMPtIndXE0ncMDoHGHxzw3iDk"></script>
</head>

<body>

<div class="wrapper">

    {include file='authentication/login.tpl'}
    {include file='authentication/register.tpl'}
    {include file='common/menu.tpl'}