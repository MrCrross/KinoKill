<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
@extends('layouts.app')

@section('content')

    <div class="my_container">
        <div class="container">

           <center>
               <button type="submit" class="btn btn-success mr-1" data-toggle="modal" data-target="#delF">Вывести фильм с проката</button>
               <button type="submit" class="btn btn-success ml-1" data-toggle="modal" data-target="#delS">Удалить сеанс у фильма</button>
           </center>
            {{--Форма добавления--}}
            <form method="post" action="{{ route('schedule.create') }}" class=" mt-2 bg-info">
                @csrf
                <h3 class="p-2 bg-light">Добавить сеанс</h3>
                <div class="form-group row mx-sm-4 ">
                    <label for="film" class="col-sm-2 col-form-label">Фильм</label>
                    <div class="col-sm-5 ">
                        <select class="form-control {{ $errors->has('film') ? ' is-invalid' : '' }}" name="film">
                            <option selected>Выберите фильм</option>
                            @foreach($films as $film)
                                <option value="{{$film->id}}">{{$film->Name_Film}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted"> Выберите фильм, которому необходим новый сеанс</small>
                    </div>

                </div>
                <div class="form-group row mx-sm-4">
                    <label for="hall" class="col-sm-2 col-form-label">Зал</label>
                    <div class="col-sm-5 ">
                        <select class="form-control {{ $errors->has('hall') ? ' is-invalid' : '' }}" name="hall">
                            @foreach($halls as $hall)
                                <option value="{{$hall->ID_Hall}}">{{$hall->Name_Hall}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted"> Выберите зал, в котором будет проходить фильм</small>
                    </div>
                </div>
                <div class="form-group row mx-sm-4">
                    <label for="timeS" class="col-sm-2 col-form-label">Новый сеанс</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control {{ $errors->has('timeS') ? ' is-invalid' : '' }}" name="timeS"  pattern="[0-9]{1,2}:[0-9]{2}" placeholder="10:00"/>
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
{{--Модальное окно вывода с проката--}}
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
                            {{--Форма вывода с проката--}}
                            <form method="post" action="{{ route('schedule.outRent') }}" >
                                @csrf
                                <div class="form-group row mx-sm-3 ">
                                    <label for="outRent" class="col-sm-3 col-form-label">Фильм</label>
                                    <div class="col-sm-7 ">
                                        <select class="form-control {{ $errors->has('outRent') ? ' is-invalid' : '' }}" size="10" name="outRent" multiple>
                                            @foreach($films as $film)
                                                <option value="{{$film->id}}">{{$film->Name_Film}}</option>
                                            @endforeach
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
{{--Модальное окно для удаления сеанса--}}
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
                    {{--Форма удаления сеанса--}}
                    <form method="post" action="{{ route('schedule.outS') }}" >
                        @csrf

                        <div class="form-group row mx-sm-3 ">
                            <label for="session" class="col-sm-3 col-form-label">Сеанс</label>
                            <div class="col-sm-9 ">
                                <select class="form-control {{ $errors->has('session') ? ' is-invalid' : '' }}" size="12" name="session" multiple>
                                    @foreach($schedule as $session)
                                        <option value="{{$session->id_schedule}}">{{$session->Name_Film}} : {{$session->Name_Hall}} : {{$session->TimeS}}</option>
                                    @endforeach
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
{{--Скрипты--}}
@endsection