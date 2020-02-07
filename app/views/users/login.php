<?php require_once(Config::get('directory/approot') . 'views/inc/header.php'); ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php Session::flash('Register_Success'); ?>
            <h2 class="text-center">Login</h2>
            <p class="text-center">Please fill in your login details</p>
            <form action="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/users/login'); ?>" method="post">
            <label for="email">Email: <sup>*</sup></label>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">@</span>
                    </div>
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <label for="password">Password: <sup>*</sup></label>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="passwordInput" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-lock" id="inputState"></i></span>
                    </div>
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= Config::get('directory/urlroot'); ?>/users/register" class="btn btn-light btn-block">No account yet? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('inputState').addEventListener('click', (e) => {
        if (e.target.className === 'fa fa-lock') {
            e.target.className = 'fa fa-lock-open';
            document.getElementById('passwordInput').type = 'text';
        } else {
            e.target.className = 'fa fa-lock';
            document.getElementById('passwordInput').type = 'password';
        }
    });
</script>
<?php require_once(Config::get('directory/approot') . 'views/inc/footer.php'); ?>