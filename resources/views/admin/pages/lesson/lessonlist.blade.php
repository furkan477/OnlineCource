@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Derslerin Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Ders Listesi</li>
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
                            <h3 class="card-title">Sitedeki Kursların Ders Listesi ({{count($lessons)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Dersi Oluşturan</th>
                                        <th>Ders Başlığı</th>
                                        <th>Ders Açıklaması</th>
                                        <th>Dersin Kursu</th>
                                        <th>Ders Oluşturma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($lessons))
                                        @foreach ($lessons as $lesson)
                                            <tr>
                                                <td>{{$lesson->id}}</td>
                                                <td><a href="{{route('admin.user.about',$lesson->cources->user->id)}}">{{$lesson->cources->user->name}}</a></td>
                                                <td>{{$lesson->title}}</td>
                                                <td>{{$lesson->content}}</td>
                                                <td><a href="{{route('admin.cource.about',$lesson->cources->id)}}">{{$lesson->cources->title}}</a></td>
                                                <td>{{$lesson->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.lesson.edit',$lesson->id)}}" class="btn btn-info">Düzenle</a>
                                                    <a href="{{route('admin.lesson.delete',$lesson->id)}}" class="btn btn-danger">Silmek</a>
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