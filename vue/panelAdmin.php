<?php
require_once 'pageContent/header.php';

/**
 * Created by PhpStorm.
 * User: alban
 * Date: 06/12/2019
 * Time: 10:16
 */
?>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="card offset-1" style="width: 40rem;">
                <div class="card-header"><h5>Ajouter un article</h5></div>
                <form class="card-body" method="post">

                    <div class="form-group">
                        <label>Titre :</label>
                        <input class="form-control" type="text" name="InTitre">
                    </div>

                    <div class="form-group">
                        <label>Prenom auteur :</label>
                        <input class="form-control" type="text" name="InPauteur">
                    </div>

                    <div class="form-group">
                        <label>Nom auteur :</label>
                        <input class="form-control" type="text" name="InNauteur">
                    </div>

                    <div class="form-group">
                        <label>Date :</label>
                        <input class="form-control" type="date" value="<?php echo date("Y-m-j"); ?>" name="InDate">
                    </div>

                    <div class="form-group">
                        <label for="msg">Description :</label>
                        <textarea class="form-control" id="msg" name="InDesc"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Valider</button>
                    </div>
                    <input type="hidden" name="action" value="AjouterArticle">

                </form>
            </div>

            <form class="card-body" method="post">

                <div class="form-group">
                    <label>rechercher par date  :</label>
                    <input class="form-control" type="date" name="InDate">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Valider</button>
                </div>
                <input type="hidden" name="action" value="chercherParDate">
            </form>
            <!----------------------------------------- MOFID ARTICLE----------------------------------------------- -->
            <?php if(isset($articleModif)) : ?>
            <?php if(!empty($articleModif)):?>
            <div class="card offset-1" style="width: 40rem;">
                <div class="card-header"><h5>Modifier un article</h5></div>
                <form class="card-body" method="post">

                    <div class="form-group">
                        <label>Titre :</label>
                        <input class="form-control" type="text" name="InTitre" value="<?=$articleModif->getTitre();?>">
                    </div>

                    <div class="form-group">
                        <label>Prenom auteur :</label>
                        <input class="form-control" type="text" name="InPauteur" value="<?=$articleModif->getPrenomAuteur();?>">
                    </div>

                    <div class="form-group">
                        <label>Nom auteur :</label>
                        <input class="form-control" type="text" name="InNauteur" value="<?=$articleModif->getNomAuteur();?>">
                    </div>

                    <div class="form-group">
                        <label>Date :</label>
                        <input class="form-control" type="date" name="InDate" value="<?=$articleModif->getDate();?>">
                    </div>

                    <div class="form-group">
                        <label for="msg">Description :</label>
                        <textarea class="form-control" id="msg" name="InDesc"><?=$articleModif->getTexte();?></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Valider</button>
                    </div>
                    <input type="hidden" name="action" value="modifArticle">
                    <input type="hidden" name="id" value="<?=$articleModif->getId();?>">
                </form>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <br>
        <!----------------------------------------- SUPRIME ARTICLE----------------------------------------------- -->
        <div class="row">
            <div class="card offset-1" style="width: 40rem;">
                <div class="card-header"><h5>Suprimer un article</h5></div>
                <ul class="list-group list-group-flush">
                    <? if(isset($articleList)):
                        foreach ($articleList as $article): ?>
                            <li class="list-group-item"><i><?= $article->getTitre(); ?></i>
                                <form method="post">
                                    <button type="submit" class="close text-success" name="action"
                                            value="showArticle"><span
                                                class="fas fa-undo" style="padding: 4px;"></span></button>
                                    <button type="submit" class="close text-danger" name="action"
                                            value="SupprimerArticle"><span
                                                class="far fa-trash-alt" style="padding: 4px;"></span></button>
                                    <input type="hidden" name="articleId" value="<?= $article->getId(); ?>">

                                </form>
                            </li>

                         <?php endforeach;?>
                    <?php else :
                         if(isset($articleListRecherche)):
                            foreach ($articleListRecherche as $article): ?>
                                <li class="list-group-item"><i><?= $article->getTitre(); ?></i>
                                    <form method="post">
                                        <button type="submit" class="close text-success" name="action"
                                                value="showArticle"><span
                                                    class="fas fa-undo" style="padding: 4px;"></span></button>
                                        <button type="submit" class="close text-danger" name="action"
                                                value="SupprimerArticle"><span
                                                    class="far fa-trash-alt" style="padding: 4px;"></span></button>
                                        <input type="hidden" name="articleId" value="<?= $article->getId(); ?>">

                                    </form>
                                </li>
                            <?php endforeach;
                             endif;
                        endif; ?>

        </ul>
            </div>

        </div>
    </div>
    </body>

<?php
require_once 'pageContent/phouter.php';
?>