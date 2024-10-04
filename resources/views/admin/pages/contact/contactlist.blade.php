@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kullanıcı İletişim Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Kullanıcı İletişim Listesi</li>
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
                            <h3 class="card-title">Siteyle İletişime Geçenler Listesi ({{count($contacts)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>İsim Soyisim</th>
                                        <th>Rolü</th>
                                        <th>Konu</th>
                                        <th>Mesaj</th>
                                        <th>Gönderme Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($contacts))
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td><a href="{{route('admin.user.about',$contact->user->id)}}">{{$contact->user->name}}</a></td>
                                                <td>{{$contact->user->role}}</td>
                                                <td>{{$contact->subject}}</td>
                                                <td>{{$contact->message}}</td>
                                                <td>{{$contact->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.contact.delete',$contact->id)}}" class="btn btn-danger">Silmek</a>
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