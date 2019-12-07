<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 03/12/2019
 * Time: 17:06
 */

class ControlAdmin
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

               /* case SeDeconnecter:
                    SeDeconnecter();
                    break;*/

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
            $articleList = $model->getAllArticle();
            require_once $rep . 'vue/panelAdmin.php';
        }

        public function AjouterArticle()
        {

            $titre = $_POST['InTitre'];
            $nAuteur = $_POST['InNauteur'];
            $pAuteur = $_POST['InPauteur'];
            $date=$_POST['InDate'];
            $desc=$_POST['InDesc'];


            $m = new ModelGeneral();
            $article = new Article(0,$desc,$titre,$date,$pAuteur,$nAuteur);
            $m->mInsertArticle($article);
            $this->initView();

        }

        public function SupprimerArticle(){
            $id = $_POST['articleId'];
            if (! Validation::isInt($id)){
                throw new Exception('c pas int');
            }

            $model = new ModelGeneral();
            $model->removeArticleByID($id);
            $this->initView();
        }

        public function showArticleModif(){
            $id = $_POST['articleId'];
            if (! Validation::isInt($id)){
                throw new Exception('c pas int');
            }

            $model = new ModelGeneral();
            $articleModif = $model->getArticleById($id);



            $this->initView($articleModif);
        }

        private function modifArticle(){

            $titre = $_POST['InTitre'];
            $nAuteur = $_POST['InNauteur'];
            $pAuteur = $_POST['InPauteur'];
            $date = $_POST['InDate'];
            $desc = $_POST['InDesc'];
            $id = $_POST['id'];

            $m = new ModelGeneral();
            $article = new Article($id,$desc,$titre,$date,$pAuteur,$nAuteur);
            $m->reviseArticle($article);

            $this->initView();
        }





}







/* try{
        $acrion = $
        switch($action){
         case delet:

        }
    }catch(){

public function ajoutterdata(){

    $titre = $_POST['titre'];
    $url = $_POST['url'];
    $titre = netooyage::titre($titre);
    $url----;
    $mdl = new model
        $m->insertnews($data);
    require['page.php'];

}*/



