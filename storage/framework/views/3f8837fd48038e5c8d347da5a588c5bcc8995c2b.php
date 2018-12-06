<link rel="stylesheet" href="<?php echo e(asset('css/KinoCSS.css')); ?>" >
<script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<?php $__env->startSection('content'); ?>

    <div class="my_container">
        <div class="container">

           <center>
               <button type="submit" class="btn btn-success mr-1" data-toggle="modal" data-target="#delF">Вывести фильм с проката</button>
               <button type="submit" class="btn btn-success ml-1" data-toggle="modal" data-target="#delS">Удалить сеанс у фильма</button>
           </center>
            
            <form method="post" action="<?php echo e(route('schedule.create')); ?>" class=" mt-2 bg-info">
                <?php echo csrf_field(); ?>
                <h3 class="p-2 bg-light">Добавить сеанс</h3>
                <div class="form-group row mx-sm-4 ">
                    <label for="film" class="col-sm-2 col-form-label">Фильм</label>
                    <div class="col-sm-5 ">
                        <select class="form-control <?php echo e($errors->has('film') ? ' is-invalid' : ''); ?>" name="film">
                            <option selected>Выберите фильм</option>
                            <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($film->id); ?>"><?php echo e($film->Name_Film); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted"> Выберите фильм, которому необходим новый сеанс</small>
                    </div>

                </div>
                <div class="form-group row mx-sm-4">
                    <label for="hall" class="col-sm-2 col-form-label">Зал</label>
                    <div class="col-sm-5 ">
                        <select class="form-control <?php echo e($errors->has('hall') ? ' is-invalid' : ''); ?>" name="hall">
                            <?php $__currentLoopData = $halls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($hall->ID_Hall); ?>"><?php echo e($hall->Name_Hall); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted"> Выберите зал, в котором будет проходить фильм</small>
                    </div>
                </div>
                <div class="form-group row mx-sm-4">
                    <label for="timeS" class="col-sm-2 col-form-label">Новый сеанс</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?php echo e($errors->has('timeS') ? ' is-invalid' : ''); ?>" name="timeS"  pattern="[0-9]{1,2}:[0-9]{2}" placeholder="10:00"/>
                    </div>
                </div>
                <div class="form-group row mx-sm-4">
                    <div class="col-md-5 offset-md-5">
                        <button type="submit" class="btn btn-primary ml-3 mt-1 mb-3" id="add">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

            <div class="modal fade bd-example-modal-lg" id="delF" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Вывод с проката</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body bg-info">
                            
                            <form method="post" action="<?php echo e(route('schedule.outRent')); ?>" >
                                <?php echo csrf_field(); ?>
                                <div class="form-group row mx-sm-3 ">
                                    <label for="outRent" class="col-sm-3 col-form-label">Фильм</label>
                                    <div class="col-sm-7 ">
                                        <select class="form-control <?php echo e($errors->has('outRent') ? ' is-invalid' : ''); ?>" size="10" name="outRent" multiple>
                                            <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($film->id); ?>"><?php echo e($film->Name_Film); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small class="form-text text-muted"> Восстановить фильм с его расписанием неполучиться</small>
                                        <small class="form-text text-muted"> *CTRL или SHIFT для выбора нескольких полей</small>

                                    </div>
                                </div>

                                <div class="form-group row mx-3">
                                    <div class="col-md-6 offset-md-5">
                                        <button type="submit" class="btn btn-primary" id="del">Вывести</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <div class="modal fade bd-example-modal-lg" id="delS" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Удалить сеанс</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-info">
                    
                    <form method="post" action="<?php echo e(route('schedule.outS')); ?>" >
                        <?php echo csrf_field(); ?>

                        <div class="form-group row mx-sm-3 ">
                            <label for="session" class="col-sm-3 col-form-label">Сеанс</label>
                            <div class="col-sm-9 ">
                                <select class="form-control <?php echo e($errors->has('session') ? ' is-invalid' : ''); ?>" size="12" name="session" multiple>
                                    <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($session->id_schedule); ?>"><?php echo e($session->Name_Film); ?> : <?php echo e($session->Name_Hall); ?> : <?php echo e($session->TimeS); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="form-text text-muted"> *CTRL или SHIFT для выбора нескольких полей</small>
                            </div>
                        </div>

                        <div class="form-group row mx-3">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary" id="del">Вывести</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>