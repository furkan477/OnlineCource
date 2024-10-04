@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategorilerin Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Kategori Listesi</li>
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
                            <h3 class="card-title">Sitedeki Kategori Listesi ({{count($categories)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Kategori Adı</th>
                                        <th>Kategori İçerik</th>
                                        <th>Rolü</th>
                                        <th>Alt Kategorileri</th>
                                        <th>Kurs Sayısı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($categories))
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                <td>{{$category->cat_ust == 0 ? '0 Ana Kategori' : $category->cat_ust.' Alt Kategori'}}</td>
                                                <td>
                                                    @foreach ($category->underCategory as $altcat)
                                                        {{$altcat->name}},<br>
                                                    @endforeach
                                                </td>
                                                <td>{{count($category->cources).' Kursu var'}}</td>
                                                <td>{{$category->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-info">Düzenle</a>
                                                    <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-danger">Silmek</a>
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