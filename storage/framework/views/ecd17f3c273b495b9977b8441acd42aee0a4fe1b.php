<?

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

if(Auth::user()){
    $role = DB::table('users')->find(Auth::user()->id);
}
?>
<?php if(Auth::user()): ?>
    <?php if($role->role == 1): ?>
        <?$auth=1;?>
    <?php elseif($role->role == 0): ?>
        <?$auth=0;?>
    <?php endif; ?>
    <?php else: ?>
        <?$auth=0;?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-laravel" style="background-image:url(<?php echo e(asset('storage/icon/menu_texture.jpg')); ?>)">
            <div class="container" >
                <?php if($auth==0): ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('storage/icon/Logo.png')); ?>" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(route('films.index')); ?>"><?php echo e(__('Фильмы')); ?> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(route('schedule.index')); ?>"><?php echo e(__('Расписание')); ?></a>
                        </li>
                    </ul>
                <?php endif; ?>
                <?php if($auth==1): ?>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('storage/icon/Logo.png')); ?>" class="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?php echo e(route('films.create')); ?>"><?php echo e(__('Добавить фильм')); ?> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?php echo e(route('schedule.create')); ?>"><?php echo e(__('Добавить расписание')); ?></a>
                            </li>
                        </ul>
                <?php endif; ?>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>

                                <li class="nav-item">
                                    <a class="nav-link text-light" href="<?php echo e(route('login')); ?>"><?php echo e(__('Вход')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <?php if(Route::has('register')): ?>
                                        <a class="nav-link text-light" href="<?php echo e(route('register')); ?>"><?php echo e(__('Регистрация')); ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown" style="border: 3px solid #ffffff; background-image: url('http://127.0.0.1:8000/storage/icon/content.jpg');">
                                        <a class="dropdown-item text-light " style="background-image: url('http://127.0.0.1:8000/storage/icon/content.jpg');" href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Выйти')); ?>

                                        </a>

                                        <form id="logout-form" class="" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            <?php if($auth==1): ?>
                                <li class="nav-item">
                                        <a class="nav-link text-light" href="<?php echo e(route('regAdmin')); ?>"><?php echo e(__('Регистрация')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
