<section class="row">
    <div class="col-lg-10">

        <?php
            if(!is_null($data)):
            foreach($data as $key => $value):
               if($key === 'pager') continue;
        ?>
        <div class="content-area">
            <img src="<?php echo $value['imgPath'];?>" alt="">
            <div class="content-text">
                <h2 class="content-title">
                    <a href="/article/view/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
                </h2>
                <div>
                    <?php
                    $string = $value['article'];
                    $replacement = "...";
                    $start = 200;
                    echo Helper::mb_substr_replace($string, $replacement, $start);
                    ?>
                </div>
            </div>
        </div>
        <?php
            endforeach;
        ?>
        <nav aria-label="Page navigation" class="content-center">
            <ul class="pagination">
                <li>
                    <a href="/home/index/1" aria-label="First">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    for($i=1; $i <= $data['pager']; $i++):
                ?>
                <li><a href="/home/index/<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php
                    endfor;
                ?>
                <li>
                    <a href="/home/index/<?php echo $data['pager'];?>" aria-label="Last">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
    <div class="col-lg-2 sidebar">
        <p class="panel-title">Available actions:</p>
        <a class="actions" href="/article/create">Create New Article</a>
    </div>
    <?php
        else:
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('Location:' . $host . 'article/create');
        endif;
    ?>
</section>