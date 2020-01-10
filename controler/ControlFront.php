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

      //suppression du cookie avec l'id de session a la fermeture du navigateur
        ini_set("session.cookie_lifetime",0);
        //empeche les injections javascript
        ini_set("session.cookie_httponly","On");
        //pour rejeter les id de sessions donnés par un utilisateur
        ini_set("session.use_strict_mode","On");
        //autorise l'accès au cookie contenant l'id de session pour un site https
        ini_set("session.cookie_secure","On");
        //supprime la possibilité d'injection et de fuites d'id de session.
        ini_set("session.use_trans_sid","Off");
        //le contenu de l'identification de session n'est pas mis en cache
        ini_set("session.cache_limiter","nocache");
        //utilise la fonction sha256 pour generer les id de session , evite les eventuels collisions de md5
        ini_set("session.hash_function","sha256");
        //ON utilise uniquement les cookies pour la gestion de l'ID de session
        ini_set("session.use_cookies","On");
        ini_set("session.use_only_cookies","On");


        session_start();



            $listeActionAdmin = array('AjouterArticle', 'SupprimerArticle', 'modifArticle', 'logout', 'showArticle','panelAdmin','chercherParDate');
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
           require_once "vue/Erreur.php";
        }
    }

}
