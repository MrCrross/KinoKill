<link rel="stylesheet" href="<?php echo e(asset('css/KinoCSS.css')); ?>" >


<?php $__env->startSection('content'); ?>
    <ul class="nav nav-pills mb-1">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('films.index')); ?>"><?php echo e('Фильмы'); ?></a>
        </li>
    </ul>
    <hr color="#ffffff" />
<div class="my_container">
    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container-fluid" >
        <div class="float-left mt-1">
                        <a class="icon_link " href="<?php echo e(route('films.show',$film->id)); ?>}">
                            <img  class= "img-thumbnail" src="<?php echo e($film->Icon); ?>">
                        </a>
        </div>

        <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label><?php echo e('Название:'); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Name_Film); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Продюсер:'); ?> </label>
                            <label class="font-italic text-light" > <?php echo e($film->Producer); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Страна: '); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Country); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Жанр: '); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Genres); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Длительность: '); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Duration); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Возрастное ограничение: '); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Age_Limit); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Рейтинг: '); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Rating); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Описание: '); ?> </label>
                            <label class="font-italic text-light"> <?php echo e($film->Description); ?></label>
                        </li>
                    </ul>
        </div>
    </div>
        <hr color="#124656" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>