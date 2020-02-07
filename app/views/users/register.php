<?php require_once(Config::get('directory/approot') . 'views/inc/header.php'); ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php if (Session::exists('status')) {
                Session::flash('status');
            } ?>
            <h2 class="text-center">Create an Account</h2>
            <p class="text-center">Please out this form to register with us</p>
            <form action="<?= Sanitize::csrfProtect(Config::get('directory/urlroot') . '/users/register'); ?>" method="post">
                <div class="form-group">
                    <label for="firstname">Firstname: <sup class="required">*</sup></label>
                    <input type="text" name="firstname" class="form-control form-control-lg <?= (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>">
                    <span class="invalid-feedback"><?= $data['firstname_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname: <sup class="required">*</sup></label>
                    <input type="text" name="lastname" class="form-control form-control-lg <?= (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>">
                    <span class="invalid-feedback"><?= $data['lastname_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup class="required">*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup class="required">*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup class="required">*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['confirm_password_err']; ?>">
                    <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= Config::get('directory/urlroot'); ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(Config::get('directory/approot') . 'views/inc/footer.php'); ?>