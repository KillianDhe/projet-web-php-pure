

<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 06/12/2019
 * Time: 10:16
 */
?>
<form  method="post">

    <div>
        <label>Titre :</label>
        <input type="text" name="InTitre">
    </div>
    <div>
        <label>Prenom auteur :</label>
        <input type="text" name="InPauteur">
    </div>
    <div>
        <label>Nom auteur :</label>
        <input type="text" name="InNauteur">
    </div>
    <div>
        <label>Date :</label>
        <input type="date" name="InDate">
    </div>
    <div>
        <label for="msg">Description :</label>
        <textarea id="msg" name="InDesc"></textarea>
    </div>
    <div>
        <button>Valider</button>
    </div>

</form>