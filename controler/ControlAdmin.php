<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 03/12/2019
 * Time: 17:06
 */

class ControlAdmin
{

    public function __construct($action)
    {
        global $rep;

                 switch ($action) {
                     case NULL :
                         $this->mainView();
                         break;

                     case 'AjouterArticle':
                         $this->AjouterArticle();
                         break;

                     case 'SupprimerArticle':
                         $this->SupprimerArticle();
                         break;

                     case 'showArticle':
                         $this->showArticleModif();
                         break;
                     case 'modifArticle' :
                         $this->modifArticle();
                         break;

                     case 'SeConnecter':
                         $this->SeConnecter();
                         break;

                     case 'loginPage' :
                         $this->loginPage();
                         break;
                     case 'login' :
                         $this->login();
                         break;

                     case 'logout' :
                         $this->logout();
                         break;


                     default:
                         /*$dVueErreur[] = "erreur apppel php";
                         require('erreur.php');*/
                         echo 'erreure form';
                         break;

                 }
             }



        public function mainView($articleModif = NULL)
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

        public function AjouterArticle()
        {

            $titre = $_POST['InTitre'];
            $nAuteur = $_POST['InNauteur'];
            $pAuteur = $_POST['InPauteur'];
            $date=$_POST['InDate'];
            $desc=$_POST['InDesc'];

            $titre=Validation::purify($titre);
            $nAuteur=Validation::purify($nAuteur);
            $pAuteur=Validation::purify($pAuteur);
            $date=Validation::purify($date);
            $desc=Validation::purify($desc);

            $m = new ModelGeneral();
            $article = new Article(0,$desc,$titre,$date,$pAuteur,$nAuteur);
            $m->mInsertArticle($article);
            $this->mainView();

        }

        public function SupprimerArticle(){
            $id = $_POST['articleId'];
            if (! Validation::isInt($id)){
                throw new Exception('c pas int');
            }

            $model = new ModelGeneral();
            $model->removeArticleByID($id);
            $this->mainView();
        }

        public function showArticleModif(){
            $id = $_POST['articleId'];
            if (! Validation::isInt($id)){
                throw new Exception('c pas int');
            }

            $model = new ModelGeneral();
            $articleModif = $model->getArticleById($id);



            $this->mainView($articleModif);
        }

        private function modifArticle(){

            $titre = $_POST['InTitre'];
            $nAuteur = $_POST['InNauteur'];
            $pAuteur = $_POST['InPauteur'];
            $date = $_POST['InDate'];
            $desc = $_POST['InDesc'];
            $id = $_POST['id'];

            if (! Validation::isInt($id)){
                throw new Exception('c pas int');
            }


            $titre=Validation::purify($titre);
            $nAuteur=Validation::purify($nAuteur);
            $pAuteur=Validation::purify($pAuteur);
            $date=Validation::purify($date);
            $desc=Validation::purify($desc);



            $m = new ModelGeneral();
            $article = new Article($id,$desc,$titre,$date,$pAuteur,$nAuteur);
            $m->reviseArticle($article);

            $this->mainView();
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

        if (!Validation::isEmail($email)) {
            throw new Exception('c pas un email');
        }
        $m = new ModelGeneral();
        $admin  = $m->getAdminByEmail($email);

        if ($admin == null) {
            throw new Exception('Mauvaise email');
        }

        if (!password_verify($pass,$admin->getMotDePasse())){
            throw new Exception('Mauvais mdp');
        }
        $_SESSION['login'] = true;
        $_SESSION['user'] = $admin;

        $this->mainView();

    }
    public function logout(){
        session_destroy();
        unset($_SESSION);

        $this->mainView();
    }




}
