@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kursların Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Kurs Listesi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 mb-5 pl-5">
        <div class="row pl-5">
            <div class="col-md-11 pl-5">
                <div class="card card-primary card-outline mb-3">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center mb-5">Sitenin Kursları</h3>
                        @if(!empty($cources))
                            @foreach($cources as $cource)
                                <div class="p-4 border mb-3 bg-light">
                                    <span
                                        class="d-block text-primary h6 text-uppercase text-center">{{$cource->title}}
                                        Kursunun Hakkında
                                    </span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="d-block ">Kurs Sahibi :  {{$cource->user->name}}</p>
                                            <p class="d-block ">Kurs Adı :  {{$cource->title}}</p>
                                            <p class="d-block ">Kurs Açıklaması :  {{$cource->description}}</p>
                                            <p class="d-block ">Kurs Fiyatı :  {{$cource->price}} ₺</p>
                                            <p class="d-block ">Kurs Kategorisi :  {{$cource->category->name}}</p>
                                            <p class="d-block ">Kurs Durumu : {{$cource->status == 0 ? 'İşleniyor' : 'İşlendi'}}</p>
                                            <p class="d-block ">Kurs Oluşturulma Tarihi : {{$cource->created_at}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="d-block ">Kurs Öğrenci Sayısı : {{count($cource->enrollments)}}</p>
                                            <p class="d-block ">Kurs Ders Sayısı : {{count($cource->lessons)}}</p>
                                            <p class="d-block ">Kurs Sınavı : {{$cource->exams ? 'Sınavı Var' : 'Sınavı Yoktur'}}</p>
                                            <p class="d-block ">Kurs Soru Sayısı : {{count($cource->exams->questions)}}</p>
                                            <p class="d-block ">Kurs Cevap Sayısı : {{count($cource->exams->questions) * 4}}</p>
                                            <p class="d-block ">Kurs Sınavına Giren Kişi Sayısı : {{count($cource->certifica)}}</p>
                                            <a href="{{route('admin.cource.about',$cource->id)}}" class="btn btn-primary">Daha Fazla Bilgi</a>
                                            <a href="{{route('admin.cource.edit',$cource->id)}}" class="btn btn-info">Düzenle</a>
                                            <a href="{{route('admin.cource.delete',$cource->id)}}" class="btn btn-danger">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection