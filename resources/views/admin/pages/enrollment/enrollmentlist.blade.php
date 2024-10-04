@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Satın Alınan İşlemler Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Satın Alma İşlemi</li>
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
                            <h3 class="card-title">Sitedeki Kursların Satın Alınma Listesi ({{count($enrollments)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Ad Soyad</th>
                                        <th>Satın Alınan Kurs</th>
                                        <th>Satın Alınan Fiyatı</th>
                                        <th>Satın Alma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($enrollments))
                                        @foreach ($enrollments as $enrollment)
                                            <tr>
                                                <td>{{$enrollment->id}}</td>
                                                <td><a href="{{route('admin.user.about',$enrollment->user->id)}}">{{$enrollment->user->name}}</a></td>
                                                <td><a href="{{route('admin.cource.about',$enrollment->cources->id)}}">{{$enrollment->cources->title}}</a></td>
                                                <td>{{$enrollment->cources->price}} ₺</td>
                                                <td>{{$enrollment->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.enrollment.delete',$enrollment->id)}}" class="btn btn-danger">İşlemi İptal Et ve Sil</a>
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