<?php


Auth::routes();

// Общая страница
    Route::get('/', 'HomeController@index')->name('home');
//  Маршруты пользователя
        //  Фильмы
        Route::get('/films', 'FilmsController@index')->name('films.index');
        Route::get('/films/{id}', 'FilmsController@show')->name('films.show');
        //  Расписание
        Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
//    Route::get('/schedule/{id}/{date}', 'ScheduleController@')->name('schedule.show');
        Route::get('/schedule/{id}/{id_schedule}', 'ScheduleController@show')->name('schedule.show');
//  Маршруты админа
        //  Добавить фильм
        Route::get('/filmAdd', 'FilmsController@indexAdmin')->name('films.create');
        Route::post('/filmAdd', 'FilmsController@store');
        //  Добавить расписание
        Route::get('/scheduleAdd', 'ScheduleController@indexAdmin')->name('schedule.create');
        Route::post('/scheduleAdd', 'ScheduleController@store')->name('schedule.create');
        //Удалить фильм с проката
        Route::post('/scheduleDelRent', 'ScheduleController@DelRent')->name('schedule.outRent');
        //Удалить сеанс с проката
        Route::post('/scheduleDelS', 'ScheduleController@DelS')->name('schedule.outS');
        // Регистрация админа
        Route::get('/regAdmin', 'UsersController@create')->name('regAdmin');
        Route::post('/regAdmin', 'UsersController@store');

        Route::post('/mail','MailController@mail')->name('tickets');