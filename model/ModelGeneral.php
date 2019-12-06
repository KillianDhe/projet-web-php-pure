<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 06/12/2019
 * Time: 11:44
 */

class ModelGeneral
{

    public function mInsertArticle(Article $article){
        global $dsn, $user, $pass;

        $artcileG = new ArticleGateWay(new Connection($dsn,$user,$pass));
        $artcileG->insertArticle($article);
    }

}