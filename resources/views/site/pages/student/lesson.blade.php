@extends('site.layout.layout')

@section('content')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Ders Detayları</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-auto">
                <h2 class="text-black">{{$lesson->title}} Dersi Hakkında</h2>
                <div class="p-4 border mb-3">
                    <span class="d-block text-primary h2 text-uppercase">Ders Adı : {{$lesson->title}}</span>
                    <span class="d-block h5">Oluşturulma Tarihi : {{$lesson->created_at}}</span>
                    <p class="d-block ">{{$lesson->content}}</p>
                </div>
            </div>
        </div>
        @if(Auth::user()->role == "stu" || Auth::user()->role == 'adm')
            <a href="{{route('stu.cource.detail',$lesson->cources->id)}}" class="btn btn-success mt-3">Diğer Derslere Git</a>
        @elseif(Auth::user()->role == "tch" || Auth::user()->role == "adm")
            <a href="{{route('cource.detail',$lesson->cources->id)}}" class="btn btn-success mt-3">Diğer Dersleri İncele</a>
            <a href="{{route('lesson.edit',$lesson->id)}}" class="btn btn-info mt-3">Dersi Düzenle</a>
            <a href="{{route('lesson.delete',$lesson->id)}}" class="btn btn-danger mt-3">Dersi Sil</a>
        @endif
    </div>
</div>

@endsection