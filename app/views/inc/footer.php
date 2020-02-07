</div>
<script src="<?= Config::get('directory/urlroot'); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?= Config::get('directory/urlroot'); ?>/js/popper.min.js"></script>
<script src="<?= Config::get('directory/urlroot'); ?>/js/bootstrap.min.js"></script>
<script src="<?= Config::get('directory/urlroot'); ?>/js/sweetalert.min.js"></script>
<script src="<?= Config::get('directory/urlroot'); ?>/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#note_body',
        height: 300,
        menubar: false
    });
</script>
</body>

</html>