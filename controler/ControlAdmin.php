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

        try {

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

                case 'panelAdmin' :
                    $this->mainView();
                    break;

                case 'chercherParDate':
                    $this->chercherParDate();
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
        Catch(Exception $e){
        require_once $rep.'vue/Erreur.php';
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

            //laisse passer l'html pour pouvoir l'afficher en tant que tel , sinon le nettoie en tant que texte  .
            if (! Validation::isValidHtml($desc)){
                $desc=Validation::purify($desc);
            }

            $titre=Validation::purify($titre);
            $nAuteur=Validation::purify($nAuteur);
            $pAuteur=Validation::purify($pAuteur);
            $date=Validation::purify($date);

            if($titre==null || $desc==null||$date==null){
                throw new Exception('Veuillez renseigner au moins un titre , une description et une date ');
            }
            $m = new ModelGeneral();
            $article = new Article(0,$desc,$titre,$date,$pAuteur,$nAuteur);
            $m->mInsertArticle($article);
            $this->mainView();

        }

        public function SupprimerArticle(){
            $id = $_POST['articleId'];
            if (! Validation::isInt($id)){
                throw new Exception('JE CROIS QUE LE PROFESSEIR ESSAIE DE ME HACKER OLALA');
            }

            $model = new ModelGeneral();
            $model->removeArticleByID($id);
            $this->mainView();
        }

        public function showArticleModif(){
            $id = $_POST['articleId'];
            if (! Validation::isInt($id)){
                throw new Exception('JE CROIS QUE LE PROFESSEIR ESSAIE DE ME HACKER OLALA');
            }

            $model = new ModelGeneral();
            $articleModif = $model->getArticleById($id);



            $this->mainView($articleModif);
        }

        private function chercherParDate(){
        $date=$_POST['InDate'];
        $date=Validation::purify($date);
         $m=new ModelGeneral();
         $articleListRecherche=$m->chercherArticleParDate($date);
         require_once "vue/panelAdmin.php";
        }

        private function modifArticle(){

            $titre = $_POST['InTitre'];
            $nAuteur = $_POST['InNauteur'];
            $pAuteur = $_POST['InPauteur'];
            $date = $_POST['InDate'];
            $desc = $_POST['InDesc'];
            $id = $_POST['id'];

            if (! Validation::isInt($id)){
                throw new Exception('JE CROIS QUE LE PROFESSEIR ESSAIE DE ME HACKER OLALA');
            }

            //laisse passer l'html pour pouvoir l'afficher en tant que tel , sinon le nettoie en tant que texte  .
            if (! Validation::isValidHtml($desc)){
               $desc=Validation::purify($desc);
            }
            $titre=Validation::purify($titre);
            $nAuteur=Validation::purify($nAuteur);
            $pAuteur=Validation::purify($pAuteur);
            $date=Validation::purify($date);




            $m = new ModelGeneral();
            $article = new Article($id,$desc,$titre,$date,$pAuteur,$nAuteur);
            $m->reviseArticle($article);

            $this->mainView();
        }



    public function logout(){
        $m = new ModelAdmin();
        $m->logout();
        require_once "vue/Connexion.php";
    }




}
