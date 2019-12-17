

<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once 'DAL/Autoload.php';
require_once 'DAL/config.php';
Autoload::charger();
try{
    new ControlFront();
}
Catch(Exception $e)
{
    require_once "vue/Erreur.php";
}



?>
