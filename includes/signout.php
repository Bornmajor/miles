<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$_SESSION['ml_usr_id'] = null;

header("location: ?page=home");

?>