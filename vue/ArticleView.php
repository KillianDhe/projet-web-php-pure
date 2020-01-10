<?php
require_once 'pageContent/header.php';
?>
<body>

<?php if(isset($article)):?>
    <div  class="container-fluid">
        <h5> <strong><?=$article->getTitre();?></strong></h5>

    </div>

    <div class="container-fluid">
        <label><strong>Auteur :</strong><?=$article->getPrenomAuteur()." ".$article->getNomAuteur();?></label> <br>
        <label><strong>Date de parution :</strong><?=$article->getDate();?></label><br>

        <?php  echo nl2br($article->getTexte());?><br>

    </div>


    </br>
<?php endif;?>

<div class="card">
    <div class="card-header"><h5>Commentaire</h5></div><br>
    <form method="post">
        <div class="container-fluid">
            <div class="form-group col-md">
                <div class="card border-dark"><br>
                    <input class="form-control" type="text" value="<?php echo ModelGeneral::getPseudoCommentaire() ;?>" name="InPseudo" placeholder="Pseudo"><br>
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
        <?php if(isset($comList)):?>
        <?php foreach ($comList as $com): ?>
            <li class="list-group-item"><i><h5><?= $com->getPseudo(); ?></h5><br>    <?= nl2br($com->getCommentaire())  ;?></i></li>
        <?php endforeach;
        else :
            echo "Soyez le premier a commenter cet article !";
         endif;?>

</body>
<?php
require_once 'pageContent/phouter.php';
?>
