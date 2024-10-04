@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kurs Sınav Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Sınavların Listesi</li>
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
                            <h3 class="card-title">Sitedeki Kursların Sınav Listesi ({{count($exams)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>İsim Soyisim</th>
                                        <th>Sınav Adı</th>
                                        <th>Sınav Açıklaması</th>
                                        <th>Sınavın Kursu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($exams))
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{$exam->id}}</td>
                                                <td><a href="{{route('admin.user.about',$exam->cources->user->id)}}">{{$exam->cources->user->name}}</a></td>
                                                <td>{{$exam->title}}</td>
                                                <td>{{$exam->description}}</td>
                                                <td><a href="{{route('admin.cource.about',$exam->cources->id)}}">{{$exam->cources->title}}</a></td>
                                                <td>{{$exam->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.exam.about',$exam->id)}}" class="btn btn-success">Hakkında</a>
                                                    <a href="{{route('admin.exam.edit',$exam->id)}}" class="btn btn-info">Düzenle</a>
                                                    <a href="{{route('admin.exam.delete',$exam->id)}}" class="btn btn-danger">Silmek</a>
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