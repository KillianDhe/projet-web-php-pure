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
    <div  class="container">

            <div class="card offset-2" style="width: 40rem;">
                <div class="card-header"><h5>Connexion administrateur</h5></div>
                <form class="card-body" method="post">

                    <div class="form-group">
                        <label>Email :</label>
                        <input class="form-control" placeholder="exemple@exemple.ex" type="email" name="InEmail">
                    </div>

                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input class="form-control" type="password" name="InPass">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                    <input type="hidden" name="action" value="login">

                </form>
            </div>

    </div>
    </body>

<?php
require_once 'pageContent/phouter.php';
?>