<?php


class ControlVisiteur
{
    public function __construct($action)
    {
        global $rep;


            switch ($action) {
                case NULL :
                case 'publicPage':
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


    }

    public function initView(){
        global $rep;
        $model = new ModelGeneral();
        $articleList = $model->getAllArticle();
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