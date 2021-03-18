<?php 
error_reporting(~E_NOTICE);
session_start();
#alerta de retorno bd
if (isset($_SESSION['session_msg'])) {		
    echo $_SESSION['session_msg'];
    unset($_SESSION['session_msg']);
}
?>