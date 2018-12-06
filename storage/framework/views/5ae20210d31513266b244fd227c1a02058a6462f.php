<link rel="stylesheet" href="<?php echo e(asset('css/KinoCSS.css')); ?>" >


<?php $__env->startSection('content'); ?>
    <div class="my_container">
    <div class="back pl " >
        <table>
            <tr> <?php $i=0 ?>
            <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i%4==0): ?>
                </tr><tr>
                <?php endif; ?>
                <?php $i++ ?>
                    <td>
                        <div>
                            <a class="icon_link" href="<?php echo e(route('films.show',$film->id)); ?>">
                                <img class= "img-thumbnail" src="<?php echo e($film->Icon); ?>"><br>
                                <label class="font-italic" ><?php echo e($film->Name_Film); ?></label>
                            </a>
                        </div>
                    </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </table>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>