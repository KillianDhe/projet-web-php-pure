<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 09/12/2019
 * Time: 19:59
 */

class ControlFront
{

    public function __construct()
    {
        session_start();

        $action = NULL;
        if(isset($_REQUEST['action'])){
            Validation::purify($action);
            $action = $_REQUEST['action'];

        }
        try {
            switch ($action) {
                case NULL :
                case 'publicPage':
                case 'AjouterCommentaire':
                    new ControlVisiteur($action);
                    break;
                    //TODO put controlVisiteur
                case 'AjouterArticle':
                case 'SupprimerArticle':
                case 'showArticle':
                case 'modifArticle' :
                case 'SeConnecter':
                case 'loginPage' :
                case 'login':
                case 'logout':
                    new ControlAdmin($action);
                    break;


                default:
                    /*$dVueErreur[] = "erreur apppel php";
                    require('erreur.php');*/
                    echo 'erreure form';
                    break;

            }
        }catch (PDOException $exception) {
            var_dump($exception);
        }catch (Exception $exception){
            var_dump($exception);
        }

    }

}