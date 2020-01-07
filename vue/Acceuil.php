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

    <div>
        <label>Nombre d'Articles : <?php echo $nbArt ?></label><br>
        <?php if(isset($_COOKIE['nbcommentaire'])): ?>
        <label>Nombre de commentaires que vous avez posté : <?php echo ModelGeneral::getnbcommentaire() ?></label>
        <?php endif; ?>
    </div>

       <?php if(isset($articleList)):
        foreach ($articleList as $article): ?>
        <div  class="container-fluid">
            <div class="row">
                <div class="card offset-1" style="width: 40rem;">
                    <div class="card-header"><h5><?=$article->getTitre();?></h5></div>
                        <label><?=$article->getPrenomAuteur()." ".$article->getNomAuteur();?></label>
                        <label><?=$article->getDate();?></label>
                         <?=nl2br($article->getTexte());?>
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
     <?php endforeach;
        endif; ?>
    </body>

<?php
require_once 'pageContent/phouter.php';
?>


