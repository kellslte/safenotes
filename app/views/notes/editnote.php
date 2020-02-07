<?php $pageTitle = 'Edit Note';
require_once(Config::get('directory/approot') . 'views/inc/header.php'); ?>
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="card card-body bg-light mt-3">
            <?php Session::flash('error'); ?>
            <h2 class="text-center"><?= $data['heading']; ?></h2>
            <form action="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/notes/editnote' . '/' . $data['id']); ?>" method="post">
                <div class="form-group">
                    <label for="note_title">Title:</label>
                    <input class="form-control  <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" id="note_title" name="title" placeholder="Enter title of note here" type="text" value="<?= $data['title']; ?>">
                    <span class="invalid-feedback"><?= $data['title_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="note_body">Note:</label>
                    <textarea name="note" id="note_body" class="form-control <?= (!empty($data['note_err'])) ? 'is-invalid' : ''; ?>" cols="30" rows="10"><?php if (!empty($data['note'])) {
                                                                                                                                                                echo $data['note'];
                                                                                                                                                            } else {
                                                                                                                                                                echo '';
                                                                                                                                                            } ?></textarea>
                    <span class="invalid-feedback"><?= $data['note_err']; ?></span>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(Config::get('directory/approot') . 'views/inc/footer.php'); ?>