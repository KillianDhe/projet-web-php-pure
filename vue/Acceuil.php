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
        <?php if(isset($nbArt)): ?>
        <label>Nombre d'Articles : <?php echo $nbArt ?></label><br>
        <?php endif;
         if(ModelGeneral::getnbcommentaire()>0): ?>
        <label>Nombre de commentaires que vous avez posté : <?php echo ModelGeneral::getnbcommentaire() ?></label>
        <?php endif; ?>
    </div>
    <div  class="container-fluid">
        <div class="row">
            <div class="card offset-1" style="width: 40rem;">
                <div class="card-header"><h5>Chercher par date</h5></div>
                <form class="card-body" method="post">

                    <div class="form-group">
                        <label>rechercher par date  :</label>
                        <input class="form-control" type="date" name="InDate">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Rechercher</button>
                    </div>
                    <input type="hidden" name="action" value="AcceuilParDate">
                </form>
                <form>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Effacer les filtres </button>
                    </div>
                    <input type="hidden" name="action" value="publicPage">
                </form>
            </div>
        </div>
    </div>
    <br>

       <?php if(isset($articleList)):
           if(empty($articleList)):
               echo "Aucun article ";
           endif;
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

    <div >
        <?php if (isset($nbPages) && isset($page)):
         if ($nbPages > 1){
        if ($page > 1){
            echo '<a class="changerPage" href="?page='.($page - 1).'">Page Précédente </a>';
        }
        echo '<a id="numeroPage" href="?page='.($page).'">'.$page.'</a>';
        if ($page < $nbPages){
            echo '<a class="changerPage" href="?page='.($page + 1).'"> Page Suivante</a>';
        }
    }
        endif; ?>
    </div>

    <div >

        <form class="card-body" method="post">

            <div class="form-group">
                <label for="msg">Nombre d'article a afficher :</label>
                <select name="NbArticleAAfficher">
                    <option value=""><?php echo ModelGeneral::getNbArticleAAfficher() ?></option>
                    <OPTION>5
                    <OPTION >10
                    <OPTION>20
                    <OPTION>30
                    <OPTION>40
                    <OPTION>50
                </select>
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
            <input type="hidden" name="action" value="setNbArticleAAfficher">
        </form>
    </div>

    </body>

<?php
require_once 'pageContent/phouter.php';
?>


