<?php

include('../../config/init.php');

header('refresh:4; url=../../index.php');

$smarty->display('common/header.tpl');
$smarty->display('common/menu.tpl');
$smarty->display('common/error.tpl');
$smarty->display('common/footer.tpl');

?>