<?php $pageTitle = 'Show Note';
require_once(Config::get('directory/approot') . 'views/inc/header.php'); ?>
<a class="btn btn-dark text-light" href="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/notes/note'); ?>"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
<div class="card my-2">
    <div class="card-title text-center">
        <h1 class="card-heading"><?= $data['title']; ?></h1>
    </div>
    <div class="card-body">
        <p class="card-body-text text-center">
            <?= $data['note']; ?>
        </p>
    </div>
    <div class="card-footer">
        <p class="card-footer-text float-right">
            <?php $createdDate = new DateTime($data['time']); ?>
            <?= $createdDate->format('D jS M h:i a'); ?>
        </p>
    </div>
</div>
<?php require_once(Config::get('directory/approot') . 'views/inc/footer.php'); ?>