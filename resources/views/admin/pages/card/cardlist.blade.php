@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sepet Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Sepet Listesi</li>
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
                            <h3 class="card-title">Sitedeki Kullanıcıların Sepet Listesindeki Ürünler ({{count($cards)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>İsim Soyisim</th>
                                        <th>Rolü</th>
                                        <th>Kursun İsmi</th>
                                        <th>Sepetindeki Kurs Sayısı</th>
                                        <th>Sepete Eklenme Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($cards))
                                        @foreach ($cards as $card)
                                            <tr>
                                                <td>{{$card->id}}</td>
                                                <td><a href="{{route('admin.user.about',$card->user->id)}}">{{$card->user->name}}</a></td>
                                                <td>{{$card->user->role}}</td>
                                                <td><a href="{{route('admin.cource.about',$card->cources->id)}}">{{$card->cources->title}}</a></td>
                                                <td>Sepetindeki kurs {{count($card->user->carts).' adet'}}</td>
                                                <td>{{$card->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.card.delete',$card->id)}}" class="btn btn-danger">Silmek</a>
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