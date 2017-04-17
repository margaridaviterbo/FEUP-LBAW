<?php
include_once('../../config/init.php');
session_unset();
session_destroy();
?>

<script>
    window.location.href = "../../index.php";
</script>