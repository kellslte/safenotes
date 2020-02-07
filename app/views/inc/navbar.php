<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <a class="navbar-brand" href="<?= Config::get('directory/urlroot'); ?>"><?= Config::get('directory/sitename'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <?php if (Session::exists('userid')) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= Config::get('directory/urlroot').'/notes/note'; ?>">Home</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>">Home</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>/pages/about">About</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php if (Session::exists('userid')) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>/users/logout">Logout</a>
        </li>
        <?php if ($pageTitle === 'Add Note') : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>/notes/note">Notes</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>/notes/addnote">Add Note</a>
          </li>
        <?php endif; ?>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>/users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Config::get('directory/urlroot'); ?>/users/login">Login</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>