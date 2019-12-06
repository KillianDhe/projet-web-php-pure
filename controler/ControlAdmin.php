<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 03/12/2019
 * Time: 17:06
 */

class ControlAdmin
{

    try{

        $action=$GET_['action'];
        switch($action)
        {
            case AjouterArticle:
                AjouterArticle();
                break;

            case SupprimerArticle:
                SupprimerArticle();
                break;

            case SeDeconnecter:
                 SeDeconnecter();
                 break;

             default:
                 $dVueErreur[]="erreur apppel php";
                 require('erreur.php');
                 break;

        }

        public function AjouterArticle()
        {

            $titre = $_POST['InTitre'];
            $nauteur=$_POST['InNauteur'];
            $pauteur=$_POST['InPauteur'];
            $date=$_POST['InDate'];
            $desc=$_POST['InDesc'];

            $desc=


            $m=new ModelGeneral();
            $article=new Article(NULL,$desc,$titre,$date,$pauteur,$nauteur);
            if ($m->mInsertArticle($article))
                $message="Article ajoute";
            else $message="article non ajouté";
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

}
