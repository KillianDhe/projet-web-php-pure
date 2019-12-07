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
    <div id="wrapperconnexion">
    <div  class="container-fluid">
        <div class="row">
            <div class="card offset-1" style="width: 40rem;">
                <div class="card-header"><h5>Connexion administrateur</h5></div>
                <form class="card-body" method="post">

                    <div class="form-group">
                        <label>Pseudo :</label>
                        <input class="form-control" type="text" name="InPseudo">
                    </div>

                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input class="form-control" type="password" name="InMotDePasse">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                    <input type="hidden" name="action" value="SeConnecter">

                </form>
            </div>
        </div>
    </div>
    </body>

<?php
require_once 'pageContent/phouter.php';
?>