<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
@extends('layouts.app')

@section('content')
    <div class="my_container">
        <div class="container-fluid" >
                <div class="float-left mt-1">
                    <a class="icon_link ">
                        <img  class= "img-thumbnail" src="{{$data->Icon}}">
                    </a>
                </div>
                <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label style="color:darkred">{{'Название:'}} </label>
                            <label class="font-italic text-light">{{$data->Name_Film}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Продюсер:'}} </label>
                            <label class="font-italic text-light" >{{$data->Producer}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Страна: '}} </label>
                            <label class="font-italic text-light">{{$data->Country}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Жанр: '}} </label>
                            <label class="font-italic text-light">{{$data->Genres}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Длительность: '}} </label>
                            <label class="font-italic text-light">{{$data->Duration}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Возрастное ограничение: '}} </label>
                            <label class="font-italic text-light">{{$data->Age_Limit}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Рейтинг: '}} </label>
                            <label class="font-italic text-light">{{$data->Rating}}</label>
                        </li>
                        <li class="row">
                            <label style="color:darkred">{{'Описание: '}} </label>
                            <label class="font-italic text-light">{{$data->Description}}</label>
                        </li>
                        <label style="color:darkred;" >{{'Сеансы: '}}</label>
                        @foreach($schedule as $post)
                            <a class="btn-group mb-1 pl-2 "  style="text-decoration:none;">
                                <button type="button" class="btn">
                                    {{$post->TimeS}}
                                </button>
                            </a>
                        @endforeach
                    </ul>
                </div>
            <hr color="#000000" />
        </div>
    </div>
@endsection