<?php


class ControlVisiteur
{
    public function __construct()
    {
        global $rep;
        try {
            $action = NULL;
            if(isset($_POST['action'])){
                $action = $_POST['action'];
            }
            switch ($action) {
                case NULL :
                    $this->initView();
                    break;

                case 'AjouterCommentaire':
                    $this->AjouterCommentaire();
                    break;



                default:
                    /*$dVueErreur[] = "erreur apppel php";
                    require('erreur.php');*/
                    echo 'erreure form';
                    break;

            }
        }catch (PDOException $PDOException){
            var_dump($PDOException);
        }catch (Exception $exception) {
            var_dump($exception);
        }

    }

    public function initView($articleModif = NULL){
        global $rep;
        $model = new ModelGeneral();
        require_once $rep . 'vue/Acceuil.php';
   }


    private function AjouterCommentaire()
    {
        $pseudo = $_POST['InPseudo'];
        $commentaire = $_POST['InCommentaire'];
        $id = $_POST['id'];

        $pseudo=Validation::purify($pseudo);
        $commentaire=Validation::purify($commentaire);


        $commentaire = new Commentaire($commentaire,$pseudo,$id);
         $m = new ModelGeneral();
        $m->insertCommentaire($commentaire);
        $this->initView();
    }

}