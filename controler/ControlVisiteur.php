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
                    try {
                        $this->AjouterCommentaire();
                    } catch (Exception $e) {
                        require_once "vue/Erreur.php";
                    }
                    break;

                case 'ShowArticle':
                    $this->showArticle();

                    break;

                case 'loginPage' :
                    try {
                        $this->loginPage();
                    } catch (Exception $e) {
                        require_once "vue/Erreur.php";
                    }
                    break;

                case 'login' :
                    try{
                        $this->login();
                    }
                    Catch(Exception $e){
                        require_once "vue/Erreur.php";
                    }
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
        if($_SESSION!=null){
            throw new Exception("vous etes déjà connecté");
        }
        global $rep;
        require_once $rep . 'vue/Connexion.php';
    }

    public function login()
    {
        if($_SESSION!=null){
            throw new Exception("vous etes déjà connecté");
        }

        if (isset($_POST['InEmail']) && isset($_POST['InPass'])){
            $email = $_POST['InEmail'];
            $pass = $_POST['InPass'];
        }

        $m = new ModelAdmin();

        $m->login($email, $pass);

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

        if (! Validation::isInt($id)){
            throw new Exception('JE CROIS QUE LE PROFESSEIR ESSAIE DE ME HACKER OLALA');
        }
        $pseudo=Validation::purify($pseudo);
        $commentaire=Validation::purify($commentaire);

        if(($pseudo==null)||($commentaire==null)){
            throw new Exception("vous devez entrer un pseudo pour commenter (ca parait logique gne)");
        }
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