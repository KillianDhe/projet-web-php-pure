<?php


class ControlVisiteur
{
    public function __construct($action)
    {

        global $rep;
        if(isset($action)){
         $action=Validation::purify($action);

        }
        try {
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

                case 'AcceuilParDate':
                    $this->AcceuilParDate();
                    break;

                case 'setNbArticleAAfficher';
                    $this->setNbArticleAAfficher();
                    break;

                default:
                    /*$dVueErreur[] = "erreur apppel php";
                    require('erreur.php');*/
                    echo 'erreure form lolol';
                    break;

            }
        }
        Catch(Exception $e)
        {
            require_once $rep.'vue/Erreur.php';
        }


    }

    public function initView(){
        global $rep;
        $model = new ModelGeneral();

        $nbArt=$model->getNbArticle();


        $nbNewsAfficher=$model->getNbArticleAAfficher();

        //fais pas le malin
        $page = (isset($_GET['page'])) ? $page = $_GET['page'] : $page = 1;
        $nbNewsTotal=$model->getNbArticle();
        $articleList = $model->getLimit(($page - 1)*$nbNewsAfficher, $nbNewsAfficher);
        $nbPages = ceil($nbNewsTotal/$nbNewsAfficher);



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
            throw new Exception("vous devez entrer un pseudo et un commentaire pour commenter (ca parait logique gne)");
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
            require $rep.'vue/ArticleView.php';


    }

    private function AcceuilParDate(){

        global $rep;
        $model = new ModelGeneral();
        $nbArt=$model->getNbArticle();
        $nbNewsAfficher=4;
        //fais pas le malin
        $page = (isset($_GET['page'])) ? $page = $_GET['page'] : $page = 1;
        $nbNewsTotal=$model->getNbArticle();

        $date=$_POST['InDate'];
        $date=Validation::purify($date);
        $articleList = $model->getLimitParDate(($page - 1)*$nbNewsAfficher, $nbNewsAfficher,$date);
        $nbPages = ceil($nbNewsTotal/$nbNewsAfficher);
        require_once "vue/Acceuil.php";
    }

    private function setNbArticleAAfficher()
    {
        $nbNewsAfficher=$_POST['NbArticleAAfficher'];
        $nbNewsAfficher=Validation::nettoyerint($nbNewsAfficher);

        $m=new ModelGeneral();
        $m->setNbArticleAAfficher($nbNewsAfficher);

        header("Refresh:0");
        /*$this->initView();*/

    }


}