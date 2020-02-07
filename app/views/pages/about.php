<?php $pageTitle = 'About Us';
require_once Config::get('directory/approot') . 'views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1><?= $data['title']; ?></h1>
        <div class="col-md-6 mx-auto">
            <p><?= $data['description']; ?></p>
            <p>Version <?= $data['version']; ?></p>
        </div>
    </div>
</div>
<?php require_once Config::get('directory/approot') . 'views/inc/footer.php'; ?>