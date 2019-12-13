<?php
require_once 'pageContent/header.php';

/**
 * Created by PhpStorm.
 * User: killian
 * Date: 07/12/2019
 * Time: 18:16
 */
    ?>
    <body>
     <?php foreach ($articleList as $article): ?>
        <div  class="container-fluid">
            <div class="row">
                <div class="card offset-1" style="width: 40rem;">
                    <div class="card-header"><h5><?=$article->getTitre();?></h5></div>
                        <label><?=$article->getPrenomAuteur()." ".$article->getPrenomAuteur();?></label>
                        <label><?=$article->getDate();?></label>
                         <label><?=$article->getTexte();?></label>
                    <form class="card-body" method="post">

                       <!-- <div class="form-group">
                            <label>Commentaires :</label>
                            <input class="form-control" type="text" name="InPseudo" placeholder="Pseudo">
                            <input class="form-control" type="text" name="InCommentaire" placeholder="Commentaire">
                        </div>-->

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Voir plus</button>
                        </div>
                        <input type="hidden" name="action" value="ShowArticle">
                        <input type="hidden" name="id" value="<?=$article->getId();?>">

                    </form>
                </div>
            </div>
        </div>
     </br>
     <?php endforeach;?>
    </body>

<?php
require_once 'pageContent/phouter.php';
?>