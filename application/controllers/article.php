<?php

class Article extends Controller
{
    public $id;
    public $model;
    public $view;

    function __construct($id)
    {
        $this->id = $id;
        $this->model = new ArticleModel();
        $this->view = new View();
    }

    function save()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $extension = strtolower(end(explode(".", $_FILES["file"]["name"])));
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/pjpeg"))
            && ($_FILES["file"]["size"] < 300000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {

                if (file_exists(IMG_PATH . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        IMG_PATH . $_FILES["file"]["name"]);
                }
                $post['imgPath'] = '/images/' . $_FILES["file"]["name"];
            }
        } else {
            echo "Invalid file<br />";
            print_r($_FILES);
        }

        $post['title'] = $_POST['title'];
        $post['article'] = $_POST['article'];

        $postId = $this->model->save($post);

        if($postId) header('Location:' . $host . '/article/view/' . $postId);

    }

    function create()
    {
        $this->view->render('create', 'template');
    }

    function view()
    {
        $data = $this->model->getById($this->id);

        $this->view->render('article', 'template', $data);
    }

    function download()
    {
        $data = $this->model->getById($this->id);

        header("Content-Type: text/html; charset=utf-8");

        foreach ($data as $key => $value) {
            $keys[] = ucfirst($key);
            $values[] = $value;
        }

        $keysStr = implode(';', $keys);
        $valuesStr = implode(';', $values);

        $str = $keysStr . "\n" . $valuesStr;

        $filename = $data['title'] . '.csv';
        $handle = fopen($filename, 'w');

        fwrite($handle, $str);
        fclose($handle);

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        readfile($filename);

        unlink($filename);
    }
}