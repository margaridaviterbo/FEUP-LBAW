<?php

  /*  session_set_cookie_params(3600);
    session_start();

    error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

    $BASE_DIR = '/home/margarida/Documents/3ºano/2ºsemestre/LBAW/FEUP-LBAW/proto/';
    $BASE_URL = '/';

    $conn = new PDO('pgsql:host=localhost;dbname=postgres', 'postgres', 'postgres');
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');

    $smarty = new Smarty;
    $smarty->template_dir = $BASE_DIR . 'templates/';
    $smarty->compile_dir = $BASE_DIR . 'templates_c/';
    $smarty->assign('BASE_URL', $BASE_URL);

    $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
    $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
    $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
    $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
    $smarty->assign('USERNAME', $_SESSION['username']);

    unset($_SESSION['success_messages']);
    unset($_SESSION['error_messages']);
    unset($_SESSION['field_errors']);
    unset($_SESSION['form_values']);*/


  session_set_cookie_params(3600, '/~lbaw1622/FEUP-LBAW/');
  session_start();

  error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

  $BASE_DIR = '/opt/lbaw/lbaw1622/public_html/FEUP-LBAW/proto/';
  $BASE_URL = '/~lbaw1622/FEUP-LBAW/proto/';

  $conn = new PDO('pgsql:host=dbm;dbname=lbaw1622', 'lbaw1622', 'aj47ud76');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //$conn->exec('SET SCHEMA \'proto\''); //FIXME?

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');

  $smarty = new Smarty;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);

  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);

  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);

?>
