<link rel="stylesheet" href="<?php echo e(asset('css/KinoCSS.css')); ?>" >


<?php $__env->startSection('content'); ?>
    <ul class="nav nav-pills mb-1">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('schedule.index')); ?>"><?php echo e('Расписание'); ?></a>
        </li>
    </ul>
    <hr color="#ffffff" />
    <div class="my_container">
        <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="container-fluid" >
            <div class="float-left mt-1">
                <a class="icon_link " href="/films/<?php echo e($data->id); ?>">
                    <img  class= "img-thumbnail" src="<?php echo e($data->Icon); ?>">
                </a>
            </div>
            <div class="mt-2">
                <ul>
                    <li class="row">
                        <label ><?php echo e('Название:'); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Name_Film); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Продюсер:'); ?> </label>
                        <label class="font-italic text-light" ><?php echo e($data->Producer); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Страна: '); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Country); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Жанр: '); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Genres); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Длительность: '); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Duration); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Возрастное ограничение: '); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Age_Limit); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Рейтинг: '); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Rating); ?></label>
                    </li>
                    <li class="row">
                        <label ><?php echo e('Описание: '); ?> </label>
                        <label class="font-italic text-light"><?php echo e($data->Description); ?></label>
                    </li>
                    <li class="row">
                    <label ><?php echo e('Сеансы: '); ?></label>
                    <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->id == $post->ID_Film): ?>
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/schedule/<?php echo e($data->id); ?>/<?php echo e($post->id_schedule); ?>">
                                <button type="button" class="btn">
                                    <?php echo e($post->TimeS); ?>

                                </button>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                </ul>
            </div>
            <hr color="#000000" />
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>