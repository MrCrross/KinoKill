<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills mb-1">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('films.index') }}">{{'Фильмы'}}</a>
        </li>
    </ul>
    <hr color="#ffffff" />
<div class="my_container">
    @foreach($films as $film)
    <div class="container-fluid" >
        <div class="float-left mt-1">
                        <a class="icon_link " href="{{ route('films.show',$film->id) }}}">
                            <img  class= "img-thumbnail" src="{{$film->Icon}}">
                        </a>
        </div>

        <div class="mt-2">
                    <ul>
                        <li class="row">
                            <label>{{'Название:'}} </label>
                            <label class="font-italic text-light"> {{$film->Name_Film}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Продюсер:'}} </label>
                            <label class="font-italic text-light" > {{$film->Producer}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Страна: '}} </label>
                            <label class="font-italic text-light"> {{$film->Country}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Жанр: '}} </label>
                            <label class="font-italic text-light"> {{$film->Genres}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Длительность: '}} </label>
                            <label class="font-italic text-light"> {{$film->Duration}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Возрастное ограничение: '}} </label>
                            <label class="font-italic text-light"> {{$film->Age_Limit}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Рейтинг: '}} </label>
                            <label class="font-italic text-light"> {{$film->Rating}}</label>
                        </li>
                        <li class="row">
                            <label >{{'Описание: '}} </label>
                            <label class="font-italic text-light"> {{$film->Description}}</label>
                        </li>
                    </ul>
        </div>
    </div>
        <hr color="#124656" />
    @endforeach
</div>
@endsection