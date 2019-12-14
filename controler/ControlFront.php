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
            $listeActionAdmin = array('AjouterArticle', 'SupprimerArticle', 'modifArticle', 'logout', 'showArticle');
        try {
            $modelAdmin=new ModelAdmin();
            $admin=$modelAdmin->isAdmin();
            $action = NULL;
            if (isset($_REQUEST['action'])) {

                $action = $_REQUEST['action'];
                Validation::purify($action);
            }
            if (in_array($action, $listeActionAdmin)) {
                if ($admin == null) {
                    require_once "vue/Connexion.php";
                } else {
                    new ControlAdmin($action);
                }

            } else {
                new ControlVisiteur($action);
            }
        }
        catch(Exception $e){
            echo "ya un probleme frere";
            echo $e;
        }catch (Exception $exception){
            var_dump($exception);
        }
    }

}


        /*try {
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
                    require('erreur.php');
                    echo 'erreure form';
                    break;

            }
        }catch (PDOException $exception) {
            var_dump($exception);
        }catch (Exception $exception){
            var_dump($exception);
        }

    }*/
