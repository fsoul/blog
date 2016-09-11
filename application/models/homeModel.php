<?php

class HomeModel extends Model
{

    function getArticles($page)
    {

        $perPage = 1;
        $recordsQty = $this->getTableSize();
        $pager = ceil($recordsQty / $perPage);

        if(is_null($page)){
            $offset = 0;
        } else{
            $offset = ($page - 1) * $perPage;
        }

        $query = 'SELECT * FROM Articles ORDER BY Id DESC LIMIT ' . $perPage . ' OFFSET ' . $offset;
        $stmt = Db::getInstance()->query($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (empty($result)) Route::ErrorPage404();
        $result['pager'] = $pager;

        return $result;
    }

    function getTableSize()
    {
        $query = 'SELECT COUNT(*) FROM Articles';
        $stmt = Db::getInstance()->query($query);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $result = $stmt->fetchColumn();

        return $result;
    }

}
