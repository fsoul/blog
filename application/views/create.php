<section class="row">
    <div class="col-lg-offset-3 col-lg-6 content-area">
        <h2>Create new article</h2>
        <form action="/article/save" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="imgPath">Image</label>
                <input type="file" id="file" name="file" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Article Title" required>
            </div>
            <div class="form-group">
                <label for="article">Article</label>
                <textarea class="form-control" name="article" placeholder="Article Text" required></textarea>
            </div>
            <button type="submit" class="btn btn-success sbmt">Create</button>
        </form>
    </div>
</section>