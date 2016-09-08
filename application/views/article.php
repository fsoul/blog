<section class="row">
    <div class="col-lg-12 content-area">
        <a class="label label-primary pull-right dwld" href="/article/download/<?php echo $data['id'];?>">Download as CSV</a>
        <h2><?php echo $data['title'];?></h2>
        <p>Created at: <?php echo $data['createdDate'];?></p>
        <img src="<?php echo $data['imgPath'];?>">
        <div class="article">
            <?php echo $data['article'];?>
        </div>

        <p class="content-center"> Back to <a href="/">Home Page</a></p>
    </div>
</section>