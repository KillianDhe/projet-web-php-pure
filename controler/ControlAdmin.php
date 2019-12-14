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
                         try {
                             $this->SupprimerArticle();
                         } catch (Exception $e) {
                         }
                         break;

                     case 'showArticle':
                         try {
                             $this->showArticleModif();
                         } catch (Exception $e) {
                         }
                         break;
                     case 'modifArticle' :
                         try {
                             $this->modifArticle();
                         } catch (Exception $e) {
                         }
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



    public function logout(){
        $m = new ModelAdmin();
        $m->logout();
        require_once "vue/Connexion.php";
    }




}
