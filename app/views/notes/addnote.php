<?php $pageTitle = 'Add Note'; require_once(Config::get('directory/approot') . 'views/inc/header.php'); ?>
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="card card-body bg-light mt-3">
            <?php Session::flash('error'); ?>
            <h2 class="text-center"><?= $data['heading']; ?></h2>
            <form action="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/notes/addnote'); ?>" method="post">
                <div class="form-group">
                    <label for="note_title">Title:</label>
                    <input class="form-control" id="note_title" name="title" placeholder="Enter title of note here" type="text">
                </div>
                <div class="form-group">
                    <label for="note_body">Note:</label>
                    <textarea name="body" id="note_body" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(Config::get('directory/approot') . 'views/inc/footer.php'); ?>