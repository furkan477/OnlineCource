@extends('site.layout.layout')

@section('content')

<div class="container-fluid mt-5 mb-5 pl-5">
    <div class="row pl-5">
        <div class="col-md-11 pl-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline mb-3">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{$user->name}}</h3>

                    <p class="text-muted text-center">
                        @if($user->role == 'stu')
                            Öğrenci
                        @elseif($user->role == 'tch')
                            Öğretmen
                        @elseif($user->role == 'adm')
                            Admin
                        @endif
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        @if($user->role == 'tch' || $user->role == 'adm')
                            <li class="list-group-item">
                                <b>Eğitim Verdiği Kurs Sayısı</b> <a href="{{route('cource.list', $user->id)}}"
                                    class="float-right">{{count($user->cources)}} Adet Kurs Eğitimi Bulunmaktadır</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <b>Sepetindeki Kurs Sayısı</b> <a href="{{route('cart', $user->id)}}"
                                class="float-right">{{count($user->carts)}} Adet Sepetindeki Kurs Bulunmaktadır</a>
                        </li>
                        <li class="list-group-item">
                            <b>Satın Aldığı Kurs Sayısı</b> <a href="{{route('stu.cource.list', $user->id)}}"
                                class="float-right">{{count($user->enrollments)}} Adet Aldığı Kurs Bulunmaktadır</a>
                        </li>
                        <li class="list-group-item">
                            <b>İletişim Destek Mesaj Sayısı</b> <a class="float-right">{{count($user->contacts)}} Adet
                                Mesajı Bulunmaktadır</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card card-primary mb-3">
                <div class="card-header">
                    <h3 class="text-center">{{$user->name}} Hakkında</h3>
                </div>
                <div class="card-body">
                    <strong>Adı ve Soyadı</strong>
                    <p>{{$user->name}}</p>
                    <hr>
                    <strong>E-Posta Adresi</strong>
                    <p>{{$user->email}}</p>
                    <hr>
                    <strong>Kullanıcı Rolü</strong>
                    <p>
                        @if($user->role == 'stu')
                            Öğrenci
                        @elseif($user->role == 'tch')
                            Öğretmen
                        @elseif($user->role == 'adm')
                            Admin
                        @endif
                    </p>
                    <hr>
                    <strong>Aramıza Katılma Tarihi</strong>
                    <p>{{$user->created_at}}</p>
                </div>
            </div>
            @if(!empty($user->contacts))
                <div class="card card-primary mb-5">
                    <div class="card-header">
                        <h3 class="text-center">{{$user->name}} Destek Mesajları</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($user->contacts as $contact)                    
                            <strong>Konusu ;</strong>
                            <p>{{$contact->subject}}</p>
                            <strong>Mesajı ;</strong>
                            <p>{{$contact->message}}</p>
                            <strong>Gönderme Tarihi ;</strong>
                            <p>{{$contact->created_at}}</p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection