<link rel="stylesheet" href="{{ asset('css/KinoCSS.css') }}" >
@extends('layouts.app')

@section('content')
    <div class="my_container">
    <div class="back pl " >
        <table>
            <tr> @php $i=0 @endphp
            @foreach($films as $film)
                @if($i%4==0)
                </tr><tr>
                @endif
                @php $i++ @endphp
                    <td>
                        <div>
                            <a class="icon_link" href="{{ route('films.show',$film->id) }}">
                                <img class= "img-thumbnail" src="{{$film->Icon}}"><br>
                                <label class="font-italic" >{{$film->Name_Film}}</label>
                            </a>
                        </div>
                    </td>
            @endforeach
            </tr>
        </table>
    </div>
    </div>
@endsection