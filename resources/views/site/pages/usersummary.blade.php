@extends('site.layout.layout')

@section('content')

<div class="container-fluid mt-5 mb-5 pl-5">
    <div class="row pl-5">
        <div class="col-md-11 pl-5">
            <div class="row mb-5 mt-3">
                <div class="col-md-12 text-center mb-3">
                    <h3>Kurslarınız Hakkında</h3>
                </div>
                @if($user->role == 'tch' || $user->role == 'adm')
                    @if(!empty($user->cources))
                        @foreach($user->cources as $cource)
                            <div class="col-sm-6 col-lg-6 mb-1" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <div class="block-4-text p-4">
                                        <h3><a href>{{$cource->title}}</a></h3>
                                        <p class="mb-3">{{$cource->description}}</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                öğrenci sayısı : {{count($cource->enrollments)}}<br>
                                                Ders sayısı : {{count($cource->lessons)}}<br>
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                Sınav : {{$cource->exams->title}}<br>
                                                Sınava Katılan Öğrenci Sayısı : {{count($cource->exams->examresults)}}<br>
                                            </div>
                                            <div class="div mt-5">
                                                <h3 class="mb-3">Kursun Öğrencileri</h3>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">ID</th>
                                                            <th>Adı Soyadı</th>
                                                            <th>Rolü</th>
                                                            <th>Katılma Tarihi</th>
                                                            <th style="width: 40px">Durumu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cource->enrollments as $student)

                                                            <tr>
                                                                <td>{{$student->user->id}}</td>
                                                                <td>{{$student->user->name}}</td>
                                                                <td>{{$student->user->role}}</td>
                                                                <td>{{$student->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('user.summary', $student->id)}}"
                                                                        class="btn btn-info" type="submit">Durumunu Gözetle</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
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
                            <b>Sertifika Sayınız</b> <a href="{{route('certifica',$user->id)}}" class="float-right">{{count($user->certifica)}} Adet
                                Sertifikanız Var.</a>
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
        </div>
    </div>
</div>

@endsection