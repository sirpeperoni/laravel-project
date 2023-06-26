<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('page.title', config('app.name')); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .container{
            max-width: 720px;
        }
    </style>
</head>
<body>

<div class="d-flex flex-column min-vh-100">
    <main>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/base.blade.php ENDPATH**/ ?>