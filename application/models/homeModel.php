<?php

class HomeModel extends Model
{

    function getArticles()
    {
        $count = 5;
        $query = 'SELECT * FROM Articles';
        $stmt = Db::getInstance()->query($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $result['size'] = $this->getTableSize();

        return $result;
    }

    function getTableSize()
    {
        $query = 'SELECT COUNT(*) FROM Articles';
        $stmt = Db::getInstance()->query($query);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $result = $stmt->fetch();

        return $result;
    }
}
