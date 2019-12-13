<?php
require_once 'pageContent/header.php';
?>
<body>

<?php if(!empty($article)):?>
    <div  class="container-fluid ">
                <h5><?=$article->getTitre();?></h5>


                    <!-- <div class="form-group">
                         <label>Commentaires :</label>
                         <input class="form-control" type="text" name="InPseudo" placeholder="Pseudo">
                         <input class="form-control" type="text" name="InCommentaire" placeholder="Commentaire">
                     </div>-->


    </div>

    <div class="container-fluid ">
        <label><?=$article->getTexte();?></label><br>
        <label><strong>Auteur :</strong><?=$article->getPrenomAuteur()." ".$article->getPrenomAuteur();?></label> <br>
        <label><strong>Date de parution :</strong><?=$article->getDate();?></label>

    </div>


    </br>
<?php endif;?>

<div class="card">
    <div class="card-header"><h5>Commentaire</h5></div><br>
    <form method="post">
        <div class="container-fluid">
            <div class="form-group col-md">
                <div class="card border-dark"><br>
                    <input class="form-control" type="text" name="InPseudo" placeholder="Pseudo"><br>
                    <textarea class="form-control" type="" name="InCommentaire" placeholder="Commentaire"></textarea><br>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Commenter</button>
                    </div>
                    <input type="hidden" name="action" value="AjouterCommentaire">
                    <input type="hidden" name="id" value="<?=$article->getId();?>">

                </div>

            </div>

    </form>
    <ul class="list-group list-group-flush">
        <?php if(!empty($comList)):?>
        <?php foreach ($comList as $com): ?>
            <li class="list-group-item"><i><h5><?= $com->getPseudo(); ?></h5><br>    <?= $com->getCommentaire();?></i></li>
        <?php endforeach; ?>
        <?php endif;?>

</body>
<?php
require_once 'pageContent/phouter.php';
?>