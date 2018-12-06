<link rel="stylesheet" href="<?php echo e(asset('css/KinoCSS.css')); ?>" >
<script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>


<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <? $t=0?>
        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($ticket->id_schedule == $post->id_schedule): ?>
        <? $t=1 ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="my_container">
            <div class="container-fluid" >
                
                <ul class="nav nav-pills mb-1">
                    <li class="nav-item">
                        <a class="nav-link" href="/films"><?php echo e('Фильмы'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule"><?php echo e('Расписание'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/films/<?php echo e($post->id); ?>"><?php echo e($post->Name_Film); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule/<?php echo e($post->id); ?>/<?php echo e($post->id_schedule); ?>"><?php echo e($post->Name_Hall); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule/<?php echo e($post->id); ?>/<?php echo e($post->id_schedule); ?>"><?php echo e($post->TimeS); ?></a>
                    </li>
                </ul>
                <hr color="#ffffff" />
                
                <div class="float-left mt-1">
                    <a class="icon_link ">
                        <img  class= "img-thumbnail" src="<?php echo e($post->Icon); ?>">
                    </a>
                </div>
                <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label ><?php echo e('Название: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Name_Film); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Продюсер: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Producer); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Страна: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Country); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('Длительность: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Duration); ?></label>
                        </li>
                        <li class="row">
                            <label><?php echo e('Возрастное ограничение: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Age_Limit); ?></label>
                        </li>
                        <li class="row">
                            <label><?php echo e('Рейтинг: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Rating); ?></label>
                        </li>
                        <li class="row">
                            <label><?php echo e('Описание: '); ?></label>
                            <label class="font-italic text-light"><?php echo e($post->Description); ?></label>
                        </li>
                        <li class="row">
                            <label ><?php echo e('День: '); ?></label>
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/films/<?php echo e($post->id); ?>">
                                <button type="button" class="btn">
                                    <?php echo e($post->DateS); ?>

                                </button>
                            </a>
                        </li>
                        <li class="row">
                            <label  ><?php echo e('Сеансы: '); ?></label>
                            <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;" href="/schedule/<?php echo e($post->id); ?>/<?php echo e($time->id_schedule); ?>">
                                    <button type="button" class="btn">
                                        <?php echo e($time->TimeS); ?>

                                    </button>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>
                </div>
                <hr color="#000000" />
            </div>
            
            <div class="container_hall">
                <div class="nameHall"><?php echo e($post->Name_Hall); ?></div>
                <div class="display"><?php echo e('Экран'); ?></div>
                <?php for( $j=1;$j<=$post->Num_Row;$j++): ?>
                    <div class="hall" >
                        <ul class="row_hall">
                            <em class="num_left"><?php echo e($j); ?></em>
                            <em class="num_right"><?php echo e($j); ?></em>
                            <li id="row" class="row_column" data-col="<?php echo e($post->Num_Column); ?>">
                                <?php for( $i=1;$i<=$post->Num_Column;$i++): ?>
                                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($j==1)||($j==2)||($j==3)): ?>
                                        <?php if(($ticket->Row == $j)&&($ticket->Column == $i)): ?>
                                            <div class="columnBlock" data-id="<?php echo e($post->id_schedule); ?>" data-col="<?php echo e($i); ?>" data-row="<?php echo e($j); ?>" data-price="<?php echo e($post->Price1); ?>" data-date="<?php echo e($post->DateS); ?>" data-time="<?php echo e($post->TimeS); ?>">
                                                <?php echo e($i); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(($ticket->Row == $j)&&($ticket->Column == $i)): ?>
                                            <div class="columnBlock" data-id="<?php echo e($post->id_schedule); ?>" data-col="<?php echo e($i); ?>" data-row="<?php echo e($j); ?>" data-price="<?php echo e($post->Price); ?>" data-date="<?php echo e($post->DateS); ?>" data-time="<?php echo e($post->TimeS); ?>">
                                                <?php echo e($i); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($j==1)||($j==2)||($j==3)): ?>
                                        <div class="column" data-id="<?php echo e($post->id_schedule); ?>" data-col="<?php echo e($i); ?>" data-row="<?php echo e($j); ?>" data-price="<?php echo e($post->Price1); ?>" data-date="<?php echo e($post->DateS); ?>" data-time="<?php echo e($post->TimeS); ?>">
                                            <?php echo e($i); ?>

                                        </div>
                                    <?php else: ?>
                                        <div class="column" data-id="<?php echo e($post->id_schedule); ?>" data-col="<?php echo e($i); ?>" data-row="<?php echo e($j); ?>" data-price="<?php echo e($post->Price); ?>" data-date="<?php echo e($post->DateS); ?>" data-time="<?php echo e($post->TimeS); ?>">
                                            <?php echo e($i); ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </li>
                        </ul>
                    </div>
                <?php endfor; ?>
                <button type="submit" class="btn btn-primary buyBtn mt-4">Забронировать</button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="modal fade" id="buy" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Бронирование билетов</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-info">
                        <form>
                            <div class="form-group">
                                <label for="emailLabel">Электронная почта</label>
                                <input type="email" class="form-control" name="email" id="inputEmail"  placeholder="example@gmail.com">
                                <small id="emailHelp" class="form-text text-muted">Укажите почту, на которую придет чек. Его необходимо оплатить на кассе кинотеатра.</small>
                            </div>
                            <div class="form-group">
                                <label for="inputData">Ваши места</label>
                                <textarea rows="10" type="text" class="form-control" id="inputData" readonly></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="checkBtn">Отправить чек</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="<?php echo e(asset('js/CorrectScript.js')); ?>"></script>
        
        <script src="<?php echo e(asset('js/Click.js')); ?>"></script>
    <script>
        // Почта и билеты
        $('#checkBtn').on('click', function (e) {
            var id = 0,
                col = [],
                row = [],
                price = 0,
                sum = 0,
                text= $(this).siblings().children('#inputData').val(),
                email = $(this).siblings().children('#inputEmail').val();
            // Заполнение формы
            $(".column").each(function () {
                if ($(this).css('border-color') === 'rgb(255, 0, 0)') {
                    id = $(this).data('id');
                    col.push($(this).data('col'));
                    row.push($(this).data('row'));
                    price = $(this).data('price');
                    sum += price;
                }
            })

            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('tickets')); ?>",
                method: 'post',
                data: {
                    id_schedule: id,
                    Column: col,
                    Row: row,
                    email: email,
                    price: sum,
                    text: text,
                    _token: '<?php echo e(csrf_token()); ?>'
                },

                success: function (results) {
                    alert(results);
                    location.reload();
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>