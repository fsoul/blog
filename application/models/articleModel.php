<?php

class ArticleModel extends Model
{
    function getById($id)
    {
        $query = 'SELECT * FROM Articles WHERE Id=' . $id;
        $stmt = Db::getInstance()->query($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result[0];
    }

    function save($post)
    {
        $stmt = Db::getInstance()->prepare("INSERT INTO Articles (title, imgPath, article) values (:title, :imgPath, :article)");
        $res = $stmt->execute($post);

        return $res;
    }
}