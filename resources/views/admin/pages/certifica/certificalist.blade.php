@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kullanıcı Sınav Sonuçları & Sertifikaları Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Sertifika Listesi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sitede Sınava Giren Kullanıcının Sertifikaları ({{count($certificas)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>İsim Soyisim</th>
                                        <th>Kurs Adı</th>
                                        <th>Sınav Adı</th>
                                        <th>Sınav Puanı</th>
                                        <th>Sertifikası</th>
                                        <th>Katılma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($certificas))
                                        @foreach ($certificas as $certifica)
                                            <tr>
                                                <td>{{$certifica->id}}</td>
                                                <td><a href="{{route('admin.user.about',$certifica->users->id)}}">{{$certifica->users->name}}</a></td>
                                                <td><a href="{{route('admin.cource.about',$certifica->cources->id)}}">{{$certifica->cources->title}}</a></td>
                                                <td><a href="{{route('admin.exam.about',$certifica->examresults->exams->id)}}">{{$certifica->examresults->exams->title}}</a></td>
                                                <td>{{$certifica->examresults->score}}</td>
                                                <td>{{$certifica->certifica}}</td>
                                                <td>{{$certifica->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.certifica.edit',$certifica->id)}}" class="btn btn-info">Düzenle</a>
                                                    <a href="{{route('admin.certifica.delete',$certifica->id)}}" class="btn btn-danger">Silmek</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection