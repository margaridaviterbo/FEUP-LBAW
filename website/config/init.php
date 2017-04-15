<?php

    $BASE_DIR = '';
    $BASE_URL = '/';

    $conn = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', 'postgres');
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       # permite que um erro seja detetado

    /*$smarty = new Smarty;
    $smarty->assign('BASE_URL', $BASE_URL);*/

?>