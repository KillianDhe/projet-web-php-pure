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
        <div  class="container-fluid">
            <div class="card-header"><h5>Aïe,aïe,aïe<br>Une erreur s'est produite</h5></div>
            <label><?=$e->getMessage();?></label>
        </div>



    </body>

<?php
require_once 'pageContent/phouter.php';
?>