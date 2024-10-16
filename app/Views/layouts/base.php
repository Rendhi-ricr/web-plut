<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
        <meta name="author" content="AdminKit">
        <meta name="keywords"
            content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="shortcut icon" href="<?=base_url()?>assets/img/icons/icon-48x48.png" />

        <title><?=$this->renderSection('title')?> | SILADU</title>

        <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url('assets/vendor/datatables/datatables.min.css')?>">
        <link rel="stylesheet"
            href="<?=base_url('assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/vendor/fontawesome-free/css/all.min.css')?>">
        <link href="<?=base_url()?>assets/css/light.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <?=$this->include('layouts/sidebar');?>

            <div class="main">
                <?=$this->include('layouts/header');?>

                <main class="content">
                    <?=$this->renderSection('content')?>
                </main>

                <?=$this->include('layouts/footer');?>
            </div>
        </div>

        <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
        <script src="<?=base_url('assets/vendor/daterangepicker/moment.min.js')?>"></script>
        <script src="<?=base_url('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
        <script src="<?=base_url('assets/vendor/datatables/datatables.min.js')?>"></script>
        <script src="<?=base_url('assets/vendor/fontawesome-free/js/all.min.js')?>"></script>
        <script src="<?=base_url('assets/js/app.js')?>"></script>

        <?=$this->renderSection('script')?>

    </body>

</html>