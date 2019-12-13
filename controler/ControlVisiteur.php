<?php


class ControlVisiteur
{
    public function __construct()
    {
        global $rep;

        $action = NULL;
        if(isset($_REQUEST['action'])){

            $action = $_REQUEST['action'];
            Validation::purify($action);

        }
            switch ($action) {
                case NULL :
                case 'publicPage':
                    $this->initView();
                    break;


                case 'AjouterCommentaire':
                    $this->AjouterCommentaire();
                    break;

                case 'ShowArticle':
                    $this->showArticle();

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


    public function AjouterCommentaire()
    {
        global $rep;
        $pseudo = $_POST['InPseudo'];
        $commentaire = $_POST['InCommentaire'];
        $id = $_POST['id'];

        $pseudo=Validation::purify($pseudo);
        $commentaire=Validation::purify($commentaire);


        $commentaire = new Commentaire($commentaire,$pseudo,$id);
         $m = new ModelGeneral();
        $m->insertCommentaire($commentaire);
        $this->showArticle();

    }

    public function showArticle($comList = NULL){
        global $rep;
        $m = new ModelGeneral();

        $id = $_POST['id'];
        if(Validation::isInt($id)){
           $article = $m->getArticleById($id);
           $comList = $m->getComWithArticleId($id);
        }
        require_once $rep.'vue/ArticleView.php';


    }



}