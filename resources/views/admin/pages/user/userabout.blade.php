@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid mt-5 mb-5 pl-5">
        <div class="row pl-5">
            <div class="col-md-11 pl-5">

                @if(($user->role == 'tch' || $user->role == 'adm') && !empty($user->cources) && $user->cources->count() >= 1)
                    <div class="row mb-5 mt-3">
                        <div class="col-md-12 text-center mb-3">
                            <h3>{{$user->name}} Kursları Hakkında</h3>
                            ({{ count($user->cources)}} adet kurs bulunmaktadır.)
                        </div>

                        @foreach($user->cources as $cource)
                            <div class="col-sm-6 col-lg-6 mb-1" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{route('admin.cource.about',$cource->id)}}">{{$cource->title}}</a></h3>
                                        <p class="mb-3">{{$cource->description}}</p>
                                        @if(!empty($cource->enrollments) && $cource->enrollments->count() >= 1 && !empty($cource->lessons) && $cource->lessons->count() >= 1 && !empty($cource->exams) && $cource->exams->count() == 1)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    öğrenci sayısı : {{count($cource->enrollments)}}<br>
                                                    Ders sayısı : {{count($cource->lessons)}}<br>
                                                </div>
                                                <div class="col-md-6 mt-1">
                                                    Sınav : {{$cource->exams->title ?? null}}<br>
                                                    Sınava Katılan : {{count($cource->exams->examresults)}}
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
                                                                <th style="width: 40px">Bilgi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cource->enrollments as $student)                                                    
                                                                <tr>
                                                                    <td>{{$student->user->id}}</td>
                                                                    <td>{{$student->user->name}}</td>
                                                                    <td>{{$student->user->role}}</td>
                                                                    <td>{{$student->user->created_at}}</td>
                                                                    <td><a href="{{route('admin.user.about',$student->user->id)}}" class="btn btn-primary" type="submit">Hakkında</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="div mt-5">
                                                    <h3 class="mb-3">Kursun Dersleri</h3>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">ID</th>
                                                                <th>Ders</th>
                                                                <th>Açıklaması</th>
                                                                <th style="width: 40px">işlem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($cource->lessons as $lesson)                                                    
                                                                <tr>
                                                                    <td>{{$lesson->id}}</td>
                                                                    <td>{{$lesson->title}}</td>
                                                                    <td>{{$lesson->content}}</td>
                                                                    <td><a href="{{route('admin.lesson.edit',$lesson->id)}}" class="btn btn-primary" type="submit">Düzenle</a>
                                                                        <a href="{{route('admin.lesson.delete',$lesson->id)}}" class="btn btn-danger" type="submit">Sil</a>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="div mt-5">
                                                    <h3 class="mb-3">Kursun Sınavına Girenler</h3>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">ID</th>
                                                                <th>Adı Soyadı</th>
                                                                <th>Rolü</th>
                                                                <th>Puanı</th>
                                                                <th>Belgesi</th>
                                                                <th style="width: 40px">Bilgi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($cource->exams->examresults as $result)                                                    
                                                                <tr>
                                                                    <td>{{$result->user->id}}</td>
                                                                    <td>{{$result->user->name}}</td>
                                                                    <td>{{$result->user->role}}</td>
                                                                    <td>{{$result->score}}</td>
                                                                    <td>
                                                                        @if($result->certifica->certifica == 0) 
                                                                            Belgesiz
                                                                        @elseif($result->certifica->certifica == 1)
                                                                            Teşekkür
                                                                        @elseif($result->certifica->certifica == 2)
                                                                            Takdir
                                                                        @endif
                                                                    </td>

                                                                    <td><a href="{{route('admin.user.about',$result->user->id)}}" class="btn btn-primary" type="submit">Hakkında</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="div mt-5">
                                                    <h3 class="mb-3">Sınav Soru & Cevap</h3>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Soru</th>
                                                                <th>Cevapları</th>
                                                                <th>Doğru Cevap</th>
                                                                <th>İşlem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($cource->exams->questions as $question)                                                    
                                                                <tr>
                                                                    <td>{{$question->question}}</td>
                                                                    <td>
                                                                        @foreach ($question->choices as $choice)
                                                                            {{$choice->choice}} ,<br>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        @foreach ($question->choices as $choice)
                                                                            {{$choice->is_correct == 1 ? $choice->choice : ''}}<br>
                                                                        @endforeach
                                                                    </td>
                                                                    <td><a href="{{route('admin.question.edit',$question->id)}}" class="btn btn-primary" type="submit">Düzenle</a>
                                                                        <a href="{{route('admin.question.delete',$question->id)}}" class="btn btn-danger" type="submit">sil</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="card card-primary card-outline mb-3">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{$user->name}} Özeti</h3>
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
                            <li class="list-group-item">
                                <b>Eğitim Verdiği Kurs Sayısı</b><a class="float-right">{{count($user->cources)}} Adet
                                    Kurs Eğitimi
                                    Bulunmaktadır</a>
                            </li>
                            <li class="list-group-item">
                                <b>Sepetindeki Kurs Sayısı</b><a class="float-right">{{count($user->carts)}} Adet
                                    Sepetindeki Kurs
                                    Bulunmaktadır</a>
                            </li>
                            <li class="list-group-item">
                                <b>Satın Aldığı Kurs Sayısı</b><a class="float-right">{{count($user->enrollments)}} Adet
                                    Aldığı Kurs
                                    Bulunmaktadır</a>
                            </li>
                            <li class="list-group-item">
                                <b>Sertifika Sayınız</b> <a class="float-right">{{count($user->certifica)}} Adet
                                    Sertifikası var.</a>
                            </li>
                        </ul>
                    </div>
                </div>

                @if(!empty($user->certifica) && $user->certifica->count() >= 1)
                    <div class="card card-primary card-outline mb-3">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">{{$user->name}} Sertifikaları</h3>
                            @if(!empty($user->certifica))
                                @foreach($user->certifica as $certifica)
                                    <div class="p-4 border mb-3 bg-light">
                                        <span
                                            class="d-block text-primary h6 text-uppercase text-center">{{$certifica->cources->title}}
                                            Kursunun
                                            {{$certifica->cources->exams->title}} Sonucu</span>
                                        <p class="d-block ">Sınava Giren Ad Soyad : {{$certifica->users->name}}</p>
                                        <p class="d-block ">Sınav Sonucu : {{$certifica->examresults->score}} Puan</p>
                                        <b>Online Cource Platformunda {{$certifica->cources->category->name}} Kategorisindeki
                                            {{$certifica->cources->title}} Kursunu
                                            {{$certifica->cources->price}} ₺ ye satın alarak
                                            giren {{$certifica->users->name}} Kişisinin sınav sonucu ve o sınav sonucuna uygun bir
                                            sertifikası
                                            türkiyenin en büyük ve en yetenekli hocalarına sahip olan
                                            Online Cource Platformunun verdiği sertifaka ;
                                            @if ($certifica->certifica == '0')
                                                <b>Maelesef tekrar yapmak zorundasınız bu kursu geçemdiniz belge alamadınız , hadi şimdi
                                                    tekrar
                                                    kurs eğitimi al ve güçlen Başarılar !</b>
                                            @elseif ($certifica->certifica == '1')
                                                <b>Tebrikler bu kursun teşekkür belgesine hak kazandınız online cource Başarılarınızın
                                                    devamını
                                                    diler !</b>
                                            @elseif ($certifica->certifica == '2')
                                                <b>Tebrikler bu kursun takdir belgesine hak kazandınız online cource platformu senden
                                                    çok memnun
                                                    başarılarının devamını online cource platformunda gerçekleştirmeni isteriz
                                                    seni aramızda görmek çok mutluluk verici Başarılar
                                                </b>
                                            @endif
                                        </b>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif

                @if(!empty($user->contacts) && $user->contacts->count() >= 1)
                    <div class="card card-primary card-outline mb-3">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">{{$user->name}} Destek Mesajları</h3>
                            @if(!empty($user->contacts))
                                @foreach($user->contacts as $contact)
                                    <div class="p-4 border mb-3 bg-light">
                                        <span
                                            class="d-block text-primary h6 text-uppercase text-center">{{$contact->subject}}</span>
                                        <b>{{$contact->message}}</b><br><br>
                                        <b>Mesaj Tarihi : {{$contact->created_at}}</b>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif

                @if(!empty($user->carts && $user->carts->count() >= 1))
                    <div class="card card-primary card-outline mb-3">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">{{$user->name}} Sepetindeki Ürünler</h3>
                            <div class="div mt-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Kurs Adı</th>
                                            <th>Kurs Fiyatı</th>
                                            <th>Ekleme Tarihi</th>
                                            <th style="width: 40px">İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->carts as $cart)                                                    
                                            <tr>
                                                <td>{{$cart->id}}</td>
                                                <td>{{$cart->cources->title}}</td>
                                                <td>{{$cart->cources->price}} ₺</td>
                                                <td>{{$cart->created_at}}</td>
                                                <a href="{{route('admin.card.delete',$cart->id)}}" style="display: inline-block;" class="btn btn-danger" type="submit">Sil</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!empty($user->enrollments) && $user->enrollments->count() >= 1)
                    <div class="card card-primary card-outline mb-3">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">{{$user->name}} Satın Aldığı Kurslar</h3>
                            <div class="div mt-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Kurs Adı</th>
                                            <th>Kurs Fiyatı</th>
                                            <th>Ekleme Tarihi</th>
                                            <th style="width: 40px">İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->enrollments as $enrollment)                                                    
                                            <tr>
                                                <td>{{$enrollment->id}}</td>
                                                <td>{{$enrollment->cources->title}}</td>
                                                <td>{{$enrollment->cources->price}} ₺</td>
                                                <td>{{$enrollment->created_at}}</td>
                                                <td style="display: flex;"><a href="{{route('admin.cource.about',$enrollment->cources->id)}}" style="display: inline-block;" class="btn btn-primary" type="submit">Hakkında</a>&nbsp;
                                                <a href="{{route('admin.enrollment.delete',$enrollment->id)}}" style="display: inline-block;" class="btn btn-danger" type="submit">Sil</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card card-primary mb-3">
                    <div class="card-header">
                        <h3 class="text-center">Hakkında</h3>
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
                            @if ($user->role == 'stu')
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
</div>

@endsection