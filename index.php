

<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once 'DAL/Autoload.php';
require_once 'DAL/config.php';
Autoload::charger();
new ControlAdmin();



/*if (isset(tab)) {
    foreach ($tab as $news) {
        echo "<a href =$news->url>$news<br>";
    }
}else{
    echo "aucune news";
}*/
?>
