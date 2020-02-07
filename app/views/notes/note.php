<?php $pageTitle = 'Notes';
require_once(Config::get('directory/approot') . 'views/inc/header.php'); ?>
<div class="d-flex justify-content-between">
    <div class="jumbotron jumbotron-fluid text-center col-9 mr-4" id="notes">
        <h1 class="mb-2"><?= $data['title']; ?></h1>
        <div class="row">
            <?php if (!empty($data['notes'])) : ?>
                <?php foreach ($data['notes'] as $note) : ?>
                    <div class="col-9 mx-auto text-center card mb-2">
                        <div class="card-body">
                            <?= Session::flash('note_message'); ?>
                            <h2 class="text-center"><?= $note->title; ?></h2>
                            <p><?= Sanitize::limit($note->note, 500); ?></p>
                            <span class="text-center">
                                <a href="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/notes/editnote') . '/' . $note->id; ?>" class="btn btn-info" id="edit"><i class="fa fa-pen-alt"></i></a>
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDialogue"><i class="fa fa-times"></i><button>
                            </span>
                        </div>
                    </div>
                    <div class="modal fade" id="confirmDialogue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    Are you sure about this?
                                </div>
                                <div class="modal-footer mx-auto">
                                    <a href="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/notes/delete') . '/' . $note->id; ?>" class="btn btn-danger">Yes</a>
                                    <a href="<?= Sanitize::csrfProtect(Config::get('directory/urlroot').'/notes/note'); ?>" class="btn btn-success">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="text-center col-6 mx-auto">
                    <p class="text-muted">You currently have no notes yet. Create one and let the fun begin</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <aside class="col-md-4 blog-sidebar">
        <div class="p-4">
            <h4 class="font-italic">All Notes</h4>
            <ol class="list-unstyled mb-0">
                <?php if (!empty($data['notes'])) : ?>
                    <?php foreach ($data['notes'] as $note) : ?>
                        <li><a href="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/notes/show') . '/' . $note->id; ?>"><?= $note->title; ?></a></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>Nothing to show...</li>
                <?php endif; ?>
            </ol>
        </div>
        <!--  <div class="p-4">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ol>
        </div> -->
    </aside>
</div>

<?php require_once Config::get('directory/approot') . 'views/inc/footer.php'; ?>