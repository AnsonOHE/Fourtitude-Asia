<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link type="text/css" href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body class="bg-slate-900 h-screen">
        <div class="container p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

	    <script type="text/javascript" src="<?php echo e(mix('js/app.js')); ?>" defer></script>
        <?php echo $__env->yieldContent('js'); ?>
    </body>
</html>
<?php /**PATH C:\laragon\www\learning\fortitude_test\resources\views/welcome.blade.php ENDPATH**/ ?>