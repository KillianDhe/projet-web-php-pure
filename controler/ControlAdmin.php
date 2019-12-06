<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 03/12/2019
 * Time: 17:06
 */

class ControlAdmin
{
    /*try{
        $acrion = $
        switch($action){
         case delet:

        }
    }catch(){*/

public function ajoutterdata(){

    $titre = $_POST['titre'];
    $url = $_POST['url'];
    $titre = netooyage::titre($titre);
    $url----;
    $mdl = new model
        $m->insertnews($data);
    require['page.php'];

}

}
