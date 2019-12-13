<?php


class ControlVisiteur
{
    public function __construct($action)
    {
        global $rep;

        if(isset($action)){
         $action=Validation::purify($action);

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

                case 'loginPage' :
                    $this->loginPage();
                    break;

                case 'login' :
                    $this->login();
                    break;

                default:
                    /*$dVueErreur[] = "erreur apppel php";
                    require('erreur.php');*/
                    echo 'erreure form lolol';
                    break;

            }


    }

    public function initView(){
        global $rep;
        $model = new ModelGeneral();
        $articleList = $model->getAllArticle();
        require_once $rep . 'vue/Acceuil.php';
   }

    public function loginPage(){
        global $rep;
        require_once $rep . 'vue/Connexion.php';
    }

    public function login()
    {

        if (isset($_POST['InEmail']) && isset($_POST['InPass'])){
            $email = $_POST['InEmail'];
            $pass = $_POST['InPass'];
        }

        $m = new ModelAdmin();
        try {
            $m->login($email, $pass);
        } catch (Exception $e) {
        }

        $this->PanelAdmin();
    }

    public function PanelAdmin($articleModif = NULL)
    {
        global $rep;
        $model = new ModelGeneral();
        $articleList = $model->getAllArticle();

        if (isset($_SESSION['login'])){
            require_once $rep . 'vue/panelAdmin.php';
            return;
        }
        require_once $rep . 'vue/Connexion.php';
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